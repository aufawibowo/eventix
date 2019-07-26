<?php

namespace App\Http\Controllers;
use App\Event;
use App\Film;
use App\EventPicture;
use App\Schedule;
use App\OrderMovie;
use App\ETicket;
use App\Order;
use Storage;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(){
		return view('user.home');
	}

	// get events of user that has been approved/ pending by admin
	public function getEvents(){
		$events = Event::where('owner', Auth::user()->id)->where('deleted', 0)->get();
		return response()->json(['data' => $events]);
	}

	public function newEventPage(Request $request){
		return view('user.new-event');
	}

	public function orderedTicketsPage(){
		$tickets = $this->getOrderedEvents();
		return view('user.tickets-ordered', ['tickets' => $tickets]);
	}

	public function bookedMoviesPage(){
		$tickets = OrderMovie::where('user_id',Auth::user()->id)->get();
		return view('user.booked-movies', compact('tickets'));
	}

	// new event
	public function storeEvent(Request $request){
		try {
			$event = Event::create([
				'name' => $request->event_name,
				'description' => $request->event_description,
				'type' => $request->event_type,
				'date1' => $request->start_date,
				'date2'  => $request->end_date,
				'quota' =>  $request->quota,
				'owner' => Auth::user()->id,
				'price' => $request->price,
				'city' => ucfirst($request->city),
				'sport_type' => $request->sport_type
			]);
			// store the pictures
			foreach ($request->event_pictures as $pics) {
				$path = $pics->store('public/event_pictures');
				EventPicture::create([
					'location' => str_replace('public/', '', $path),
					'event_id' => $event->id
				]);
			}

		} catch (\Exception $e) {
			return $e->getMessage();
			return "server error";
		}
		return back()->with('success', 'Event created successfully!');
	}
	// delete event that is still pending
	public function deleteEvent($id){

		try {
			$event = Event::find($id);
			// check if event is owned by user
			if ($event->owner == Auth::user()->id) {
				if ($event->approved == 1|| $event->approved == -1) {
					$event->deleted = 1;
					$event->save();
				}else {
					$event->delete();
				}
			}else{ //not owned by user
				return response()->json(['message' => 'unauthorised'], 401);
			}
		} catch (\Exception $e) {
			return response()->json(['message' => 'server error'], 500);
		}
		return response()->json(['message' => 'ok'], 200);

	}

	public function bookMovie(Request $request){
		$seat = Schedule::where('id_cinema',$request->cinema_id)->where('id_film',$request->film_id)->select('id', 'id_cinema', 'id_film', $request->jam)->get();
		$film = Film::find($request->film_id);
		$time = $request->jam;
		return view('user.pick_seat', compact('seat','time','film'));
	}

	public function bookMovieSubmit(Request $request){
		$seat = Schedule::where('id_cinema',$request->cinema_id)->where('id_film',$request->film_id)->select($request->waktu, 'id')->first();

      	try {
	        $dataSeat = json_decode($request->dataSeat);
	        $res=$seat[$request->waktu];
	        for ($i=0; $i < count($dataSeat) ; $i++) {
	        	if ($res[$i]=="0" && $dataSeat[$i]=="1") {
	        		$res[$i]="1";
	        	}
			}
			$dataSeat=$res;
			$jam=$request->waktu;
			$schedule= Schedule::find($seat['id']);
			$schedule->$jam = $dataSeat;
			$schedule->save();

	        OrderMovie::create([
	          'film_id' => $request->film_id,
	          'cinema_id' => $request->cinema_id,
	          'user_id' => $request->user_id,
	          'waktu' => $jam,
	          'seat' => 1,
	          'total' => $request->price,
	        ]);

      	}catch (\Exception $e) {
        	return response()->json($e->getMessage(), 500);
      	}
      return response()->json(['message'=>'success'], 201);
    }

    public function orderEvent(Request $request){
    	$quantity = $request->quantity;
    	$event_id = $request->event_id;
			// create new order
    	try {
    		$e_ticket = ETicket::create([
    			'user_id' => Auth::user()->id
    		]);

    		for ($i=0; $i < $quantity; $i++) {
    			Order::create([
    				'event_id' => $event_id,
    				'user_id' => Auth::user()->id,
    				'e_ticket_id' => $e_ticket->id
    			]);

    		}
    	} catch (\Exception $e) {
    		return response()->json(['message' => $e->getMessage()], 500);
    	}
    	return response()->json(['message' => 'ok'], 201);
    }

    public function getOrderedEvents(){
    	$e_tickets = ETicket::whereHas('orders')
    	->with('orders.event')->get();
    	return $e_tickets;
    }

    public function getTicket($id){
    	$orders = Order::where('e_ticket_id', $id)
    	->get();
			// return $orders;
    	return view('user.e-ticket', ['orders' => $orders,
    		'id' => $id]);
    }

    public function getTicketMovie($id){
    	$orders = OrderMovie::where('id', $id)->get();
			// return $orders;
    	return view('user.e-ticket-movie', ['orders' => $orders,
    		'id' => $id]);
    }

}

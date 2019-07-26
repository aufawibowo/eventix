<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class AdminController extends Controller
{
	public function index(){
		return view('admin.dashboard');
	}

	public function getEvents(){
		$events = Event::where('approved', 0)->get();
		return response()->json(['data' => $events]);
	}

	public function approveEvent($id){
		try {
			Event::find($id)->update([
				'approved' => 1
			]);
		} catch (\Exception $e) {
			return response()->json(['message' => 'server error'], 500);
		}

		return response()->json(['message' => 'ok'], 200);

	}

	public function declineEvent($id){
		try {
			Event::find($id)->update([
				'approved' => '-1'
			]);
		} catch (\Exception $e) {
			return response()->json(['message' => 'server error'], 500);
		}

		return response()->json(['message' => 'ok'], 200);

	}
}

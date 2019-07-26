<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Cinema;
use App\Schedule;
use App\FilmPicture;

class CinemaController extends Controller
{
	public function index(){
		$schedules = Schedule::orderBy('id_cinema')->get();
		$cinemas = Cinema::select('id', 'name')->orderBy('name')->get();
		$films = Film::select('id', 'name')->where('status',1)->orderBy('name')->get();
		return view('cinema.dashboard',compact('schedules','cinemas','films'));
	}

	public function newFilmPage(){
		return view('cinema.new-film');
	}

	public function listCinemas(){
		$cinemas = Cinema::orderBy('name')->get();
		return view('cinema.cinemas',compact('cinemas'));
	}

	public function listFilms(){
		$films = Film::orderBy('name')->where('status',1)->get();
        return view('cinema.films', compact('films'));
	}

	public function listFilmsComing(){
		$films = Film::orderBy('name')->where('status',2)->get();
        return view('cinema.filmsComing', compact('films'));
	}

	public function changeStatus(Request $request){
      	try {
			$film = Film::where('id',$request->film_id)->first();
			$film->status=$request->film_status;
			$film->save();

      	}catch (\Exception $e) {
			return $e->getMessage();
			return "server error";
      	}
		return back()->with('success', 'Film status changed successfully!');
    }

	public function storeFilm(Request $request){
		try {
			$film = Film::create([
				'name' => $request->film_name,
				'genre' => $request->film_genre,
				'director' => $request->film_director,
				'status' => $request->film_status,
				'duration' => $request->film_duration,
				'description' => $request->film_description,
			]);

			$path = $request->file('film_pictures')->store('public/film_pictures');
			FilmPicture::create([
				'location' => $path,
				'film_id' => $film->id
			]);

		} catch (\Exception $e) {
			return $e->getMessage();
			return "server error";
		}
		return back()->with('success', 'Film created successfully!');
	}

	public function deleteFilm(Request $request){
		try {
			$film = Film::where('id',$request->film_id)->first();
			$film->delete();

		} catch (\Exception $e) {
			return $e->getMessage();
			return "server error";
		}
		return $this->index();
	}

	public function storeSchedule(Request $request){
		try {
			$film = Schedule::create([
				'id_cinema' => $request->cinema_id,
				'id_film' => $request->film_id,
			]);

		} catch (\Exception $e) {
			return $e->getMessage();
			return "server error";
		}
		return back()->with('success', 'Schedule added successfully!');
	}
}

<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Models\Movie;

class PageController extends Controller
{
    public function index() {
        // $movies = Movie::all();
        // $movies = Movie::all() -> where();
        // $movies = Movie::all() -> orderBy();
        $movies = Movie::orderBy('title')->get();
        // $movies = Movie::where('title',  'like','%Forrest%')->get();
        // $movies = Movie::where('id', 1)->orderBy()->get();
        return view('home', compact('movies'));
    }
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'original_title' => 'required',
            'nationality' => 'required',
            'date' => 'required',
            'vote' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->original_title = $request->input('original_title');
        $movie->nationality = $request->input('nationality');
        $movie->date = $request->input('date');
        $movie->vote = $request->input('vote');
        $movie->save();

        return redirect()->route('home');
    }

    public function destroy($id) {

        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('home');
    }
}

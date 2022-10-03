<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function list(Movie $movie)
    {
        $movies = Movie::all();
        return view('index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('show', compact('movie'));
    }

    public function sync(Request $request){
        try {
            \DB::beginTransaction();
            $configuracion = Http::get('https://api.themoviedb.org/3/configuration', [
                'api_key' => env('API_KEY_TMBD'),
                'language' => 'es'
            ])->object();

            /* $response = Http::get('https://api.themoviedb.org/3/movie/550', [
                 'api_key' => env('API_KEY_TMBD'),
                 'language' => 'es'
             ])->object();*/

            $response = Http::withToken(env('API_KEY_V4_TMBD'))
                ->get('https://api.themoviedb.org/3/discover/movie', [
                    'language' => 'es'
                ])->object();

            foreach ($response->results as $data) {
                $movie = new Movie();
                $movie->id = $data->id;
                $movie->imdb_id = $data->imdb_id??null;
                $movie->title = $data->title;
                $movie->overview = $data->overview;
                $movie->release_date = $data->release_date;
                $movie->adult = $data->adult;
                $movie->image = $configuracion->images->base_url . $configuracion->images->profile_sizes['3'] . $data->poster_path;
                $movie->save();
            }
            \DB::commit();
            return redirect()->route('movies');
        }catch (\Exception $e){
            return redirect()->back()->withInput($request->all());
        }
    }
}

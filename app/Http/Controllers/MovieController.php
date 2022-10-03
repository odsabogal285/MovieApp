<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        /*$response = Http::withToken(env('API_KEY_V4_TMBD'))
            ->get('https://api.themoviedb.org/3/movie/550/images', [
                'language' => 'es',
                'include_image_language' => 'es'
            ])->object();*/

        foreach ($response->results as $data){
            $movie = new Movie();
            $movie->id = $data->id;
            dd($response->results);
            $movie->imdb_id = $data->imdb_id;
            $movie->title = $data->title;
            $movie->overview = $data->overview;
            $movie->release_date = $data->release_date;
            $movie->status = $data->status;
            $movie->adult = $data->adult;
            $movie->image = $configuracion->images->base_url.$configuracion->images->profile_sizes['3'].$data->poster_path;
            $movie->save();
        }
        /*$movie = new Movie();
        $movie->id = $response->id;
        $movie->imdb_id = $response->imdb_id;
        $movie->title = $response->title;
        $movie->overview = $response->overview;
        $movie->release_date = $response->release_date;
        $movie->status = $response->status;
        $movie->adult = $response->adult;
        $movie->image = $configuracion->images->base_url.$configuracion->images->profile_sizes['3'].$response->poster_path;
        $movie->save();*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        return view('index', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}

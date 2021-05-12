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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $movies = Movie::all();
        return view('dashboard', ['movies' => $movies]);
    }

    public function index($t, $y, $plot, $r)
    {
        $url = env("URL_omdbapi", "http://www.omdbapi.com");
        $api_key = env("API_KEY_omdbapi", "32f246bc");
        $y = $y == "none" ? "" : "&y=" . $y;
        $plot = $plot == "none" ? "" : "&plot=" . $plot;
        $r = $r == "none" ? "" : "&r=" . $r;
        $full_url = $url . "/?t=" . $t . $y . $plot . $r . "&apikey=" . $api_key;
        $response = Http::get($full_url);
        if ($r == "xml") {
            return response($response)
                ->withHeaders([
                    'Content-Type' => 'text/xml',
                ]);
        } else {
            return $response;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data_decode = json_decode($request);
        // Log::info($request);
        // $date = strtotime($request->Released);

        // Log::info(gettype($date));
        $insert_data = Movie::updateOrCreate(
            ['Title' => $request->Title, 'Year' => $request->Year],
            [
                'Year' => $request->Year,
                'Rated' => $request->Rated,
                'Released' => date('Y-m-d', strtotime($request->Released)),
                'Runtime' => $request->Runtime,
                'Genre' => $request->Genre,
                'Director' => $request->Director,
                'Writer' => $request->Writer,
                'Actors' => $request->Actors,
                'Plot' => $request->Plot,
                'Language' => $request->Language,
                'Country' => $request->Country,
                'Awards' => $request->Awards,
                'Poster' => $request->Poster,
                'Metascore' => $request->Metascore,
                'imdbRating' => $request->imdbRating,
                'imdbVotes' => $request->imdbVotes,
                'imdbID' => $request->imdbID,
                'Type' => $request->Type,
                'DVD' => date('Y-m-d', strtotime($request->DVD)),
                'BoxOffice' => $request->BoxOffice,
                'Production' => $request->Production,
                'Website' => $request->Website,
                'Response' => $request->Response,
            ]
        );
        return $insert_data;
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

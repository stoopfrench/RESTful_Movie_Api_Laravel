<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Movie;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MovieDetailResource;

class TitlesController extends Controller
{
    /**
     * Returns an index of movies in db.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$movies = Movie::paginate(50);
        $query = DB::select("SELECT B.*
		FROM (SELECT year, COUNT(*) occurrences FROM movies GROUP BY year) AS A LEFT JOIN movies AS B USING (year) 
        ORDER BY A.occurrences DESC, title");
        $response = array_map(function($movie){
            return [
                'id' => $movie->id,
                'title' => $movie->title,
                'year' => $movie->year,
                'request' => [
                    'type' => 'GET',
                    'description' => 'get details about this movie',
                    'url' => "api/titles/$movie->id"
                ]
            ];
        },$query);

        return response()->json([
            'data' => $response
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = DB::table('movies')
            ->join('genres','movies.title','=','genres.title')
            ->select("movies.*"
            ,DB::raw("(GROUP_CONCAT(genres.genre SEPARATOR '|')) as `combGenres`"))
            ->where('id','=',$id)
            ->groupBy('title')
            ->get();

        return MovieDetailResource::collection($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

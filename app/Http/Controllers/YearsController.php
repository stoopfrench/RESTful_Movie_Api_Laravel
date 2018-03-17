<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Movie;
use App\Http\Resources\YearResource;
use App\Http\Resources\YearDetailResource;

class YearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('movies')
            ->select(DB::raw('year, count(year) as count')) 
            ->groupBy('year')
            ->orderBy('count', -1)
            ->get(); 
        
        return YearResource::collection($query);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        $query = DB::table('movies')
            ->join('genres','movies.title','=','genres.title')
            ->select("movies.*"
            ,DB::raw("(GROUP_CONCAT(genres.genre SEPARATOR '|')) as `combGenres`"))
            ->where('movies.year','=',$year)
            ->groupBy('title')
            ->orderBy('title')
            ->get();
        
        return YearDetailResource::collection($query);
    }
}

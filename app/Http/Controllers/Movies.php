<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class Movies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     

        $filterMovies = Movie::filter(Movie::query(), $request)->paginate(20); 

        return $filterMovies;
        // return Movie::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:movies,title',
            'director'=>'required',
            'duration'=>'required|integer|digits_between:1,500',
            'releaseDate'=>'required|unique:movies,releaseDate',
            'imageURL'=>'url',

        ]);

        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        $request->validate([
            'title' => 'required|unique:movies,title',
            'director'=>'required',
            'duration'=>'required|integer|digits_between:1,500',
            'releaseDate'=>'required|unique:movies,releaseDate',
            'imageURL'=>'url',

        ]);

        $movie->update($request->all());
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Movie::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Result;

class MovieController extends Controller
{
    public function app()
    {
        $baseUrl = config('app.url');
        return view('movie.app', compact('baseUrl')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try{
            $movie = Movie::where('name','LIKE','%'. $r->name .'%')->get();
            return response()->json(Result::success($movie->toArray()));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("vista de Movie/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        try{
            $c = new Movie();

            $c->name = $r->name; 
            $c->description = $r->description;
            $c->status_id = $r->status; 
            $c->user_id = $r->user;

            $c->save();

        return response()->json(Result::success(null, "Movie registrada"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $Movie = Movie::find($id);

            if(!isset($Movie->id))
            return response()->json(Result::success(null,"La pelicula no existe.")); 

            return response()->json(Result::success(["movie" => $Movie]));  

        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $Movie = Movie::find($id);
            return response()->json(Result::success($Movie->toArray(), "Informacion de la Movie"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $Movie = Movie::find($id);

            if(!isset($Movie->id))
                return response()->json(Result::success(null,"Error la categoria no existe"));  

            //actualizar el name
            $Movie->name = $request->name;
            $Movie->description = $request->description;
            $Movie->status_id = $request->status_id;
            $Movie->user_id = $request->user_id;
            //guardar cambios
            $Movie->save();
            return response()->json(Result::success(null, "Movie Actualizada"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $Movie = Movie::find($id);

            if(!isset($Movie->id))
                return response()->json(Result::success(null,"Error la categoria no existe"));  

            $Movie->delete();

            return response()->json(Result::success(null, "Movie Eliminada"));   

        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }   
    }
}

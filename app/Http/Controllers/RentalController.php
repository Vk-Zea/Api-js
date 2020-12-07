<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rentals;
use App\Result;

class RentalController extends Controller
{
    public function app()
    {
        $baseUrl = config('app.url');
        return view('rental.app', compact('baseUrl')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try{
            $rent = rentals::where('start_date','LIKE','%'. $r->start_date .'%')->get();
            return response()->json(Result::success($rent->toArray()));    
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
        dd("vista de Rentals/create");
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
            $c = new rentals();
    
            $c->start_date = $r->start_date;
            $c->end_date = $r->end_date; 
            $c->total = $r->total;
            $c->user_id = $r->user_id;
            $c->status_id = $r->status_id;

            $c->save();

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error guardando el rental"));  

            return response()->json(Result::success(null,"Rental creada correctamente"));    

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
            $rentals = rentals::find($id);
            return response()->json(Result::success($rentals->toArray(),"Informacion del Rental"));    
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
            $rentals = rentals::find($id);
            return response()->json(Result::success($rentals->toArray(),"Informacion del Rental"));    
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
    public function update(Request $r, $id)
    {
        try{
            $c = rentals::find($id);

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error el rental no existe"));  

            //actualizar el name
            $c->start_date = $r->start_date;
            $c->end_date = $r->end_date; 
            $c->total = $r->total;
            $c->user_id = $r->user_id;
            $c->status_id = $r->status_id;
            //guardar cambios
            $c->save();

            return response()->json(Result::success(null,"Rental Acualizada"));    
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
            $c = rentals::find($id);
            $c->delete();
            return response()->json(Result::success(null,"Rental Eliminada Correctamente"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        } 
    }
}

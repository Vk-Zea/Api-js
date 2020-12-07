<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\statuses;
use App\Result;

class StatusController extends Controller
{
    public function app()
    {
        $baseUrl = config('app.url');
        return view('status.app', compact('baseUrl')); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try{
        $esta = statuses::where('name','LIKE','%'. $r->name .'%')->get();
        return response()->json(Result::success($esta->toArray(),"Listado de Roles"));    
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
        dd("vista de Status/create");
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
        $c = new statuses();
 
        $c->name = $r->name;
        $c->type_status_id = $r->type_status;

        $c->save();

        if(!isset($c->id))
        return response()->json(Result::success(null,"Error guardando la categoria"));   


        return response()->json(Result::success(null,"Status creada corretamente"));    
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
            $s = statuses::find($id);

            if(!isset($s->id))
            return response()->json(Result::success(null,"el estatus no existe"));   

            return response()->json(Result::success($s->toArray(),"Informacion de Status"));    
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
            $statuses = statuses::find($id);
            return response()->json(Result::success($statuses->toArray(),"Informacion de Status"));    
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
            $c = statuses::find($id);
            if(!isset($c->id))
            return response()->json(Result::success(null,"el estatus no existe"));   
            //actualizar el name
            $c->name = $r->name;
            $c->type_status_id = $r->status_type;
            //guardar cambios
            $c->save();
            

            return response()->json(Result::success(null,"Modificada correctamente"));    

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
            $c = statuses::find($id);
            if(!isset($c->id))
            return response()->json(Result::success(null,"el estatus no existe"));   
            $c->delete();
            return response()->json(Result::success(null,"Eliminada correctamente"));    

        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        }
    }
}

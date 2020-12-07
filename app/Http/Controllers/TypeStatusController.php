<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_statuses;
use App\Result;

class TypeStatusController extends Controller
{
    public function app()
    {
        $baseUrl = config('app.url');
        return view('typestatus.app', compact('baseUrl')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try{
        $rol = type_statuses::where('name','LIKE','%'. $r->name .'%')->get();
        return response()->json(Result::success($rol->toArray(),"Listado de Tipo de Statuses"));    
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
        dd("vista de typeStatus/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r )
    {
        try{
            $c = new type_statuses();
    
            $c->name = $r->name;

            $c->save();

            if(!isset($c->id))
            return response()->json(Result::success(null,"el tipo de status no existe"));   

            return response()->json(Result::success(null,"Listado de Tipo de Statuses"));    
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
        $s = type_statuses::find($id);
        return response()->json(Result::success($s->toArray(),"Informacion de typeStatuses"));    
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
            $type_statuses = type_statuses::find($id);
            dd("los datos de los statuses son:".$type_statuses);
            return response()->json(Result::success($type_statuses,"Informacion"));    
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
            $c = type_statuses::find($id);
            //actualizar el name
            $c->name = $r->name;
            
            if(!isset($c->id))
            return response()->json(Result::success(null,"Error editando el tipo de status"));   
            
            //guardar cambios
            $c->save();

            return response()->json(Result::success(null,"TypeStatus Modificado Correctamente"));    
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
            $c = type_statuses::find($id);
            $c->delete();

            if(!isset($c->id))
            return response()->json(Result::success(null,"Error eliminando el tipo de status"));   

            return response()->json(Result::success(null,"TypeStatus Eliminado Correctamente"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        } 
    }
}

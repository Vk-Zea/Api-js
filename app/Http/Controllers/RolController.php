<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles;
use App\Result;

class RolController extends Controller
{
    public function app()
    {
        $baseUrl = config('app.url');
        return view('rol.app', compact('baseUrl')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try{
        $rol = roles::where('name','LIKE','%'. $r->name .'%')->get();
        return response()->json(Result::success($rol->toArray(),"Listado de Roles"));    
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
        dd("vista de Rol/create");
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
        $c = new roles();
 
        $c->name = $r->name;
        $c->status_id = $r->status_id;

        $c->save();

        if(!isset($c->id))
        return response()->json(Result::success(null,"Error guardando el rol"));   

        return response()->json(Result::success(null,"Rol Guardado Correctamente"));    
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
        $rol = roles::find($id);
        if(!isset($rol->id))
        return response()->json(Result::success(null,"El rol no existe."));   

        return response()->json(Result::success($rol->toArray(),"Datos de Rol"));    
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
        $roles = roles::find($id);
        dd("los datos de la roles son:".$roles);
        return response()->json(Result::success($roles->toArray(),"Datos del Rental"));    
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
        $c = roles::find($id);
        //actualizar el name
        $c->name = $r->name;
        $c->status_id = $r->status_id;

        if(!isset($c->id))
                return response()->json(Result::success(null,"Error, el rol no existe")); 
        //guardar cambios
        $c->save();

        return response()->json(Result::success(null,"Rental Actualizada Correctamente"));    
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
            $c = roles::find($id);
            if(!isset($c->id))
                return response()->json(Result::success(null,"Error, el rol no existe"));   
            $c->delete();
            return response()->json(Result::success(null,"Rental Eliminada Correctamente"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        } 
    }
}

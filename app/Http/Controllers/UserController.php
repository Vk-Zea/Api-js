<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Result;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function app()
    {
        $baseUrl = config('app.url');
        return view('usuarios.app', compact('baseUrl')); 
    }

    public function index(Request $r)
    {
        try {
            $User = User::where('name','LIKE','%'. $r->name .'%')->get();
            return response()->json(Result::success($User->toArray()));    
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        try {
            $c = new User();
            $c->name = $r->name; 
            $c->email = $r->email; 
            $c->password = $r->password; 
            $c->status_id = $r->status;
            $c->rol_id = $r->rol;
            $c->save();

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error guardando el usuario"));   
            

            return response()->json(Result::success(null, "Usuario guardado"));    
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
            $User = User::find($id);
    
            if(!isset($User->id))
                    return response()->json(Result::success(null,"La el usuario no existe."));   
    
                    return response()->json(Result::success(["user" => $User]));  
    
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
        //
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
        try {
            $c = User::find($id);

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error el usuario no existe"));   
            
            $c->name = $request->name; 
            $c->email = $request->email; 
            $c->status_id = $request->status; 
            $c->rol_id = $request->rol; 
            $c->save();

            return response()->json(Result::success(null, "Usuario Editado"));    
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

            $User = User::find($id);

            if(!isset($User->id))
                return response()->json(Result::success(null,"Error, el Usuario no existe"));   

            $User->delete();

            return response()->json(Result::success(null,"Usuario Eliminado de forma correcta"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        } 
    }
}

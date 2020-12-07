<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Result;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function app()
    {
        $baseUrl = config('app.url');
        return view('categories.app', compact('baseUrl')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        try {
            $categories = Categories::where('name','LIKE','%'. $r->name .'%')->get();
            return response()->json(Result::success($categories->toArray()));    
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
        dd("vista de categorias/create");
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
            $c = new Categories();
            $c->name = $r->name; 
            $c->status_id = 1;
            $c->save();

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error guardando la categoria"));   
            

            return response()->json(Result::success(null, "Categoria guardada"));    
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
        $categories = Categories::find($id);

        if(!isset($categories->id))
                return response()->json(Result::success(null,"La categoria no existe."));   

                return response()->json(Result::success(["category" => $categories]));  

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
            $categoria = Categories::find($id);
            return response()->json(Result::success($categoria->toArray(),"Los valores de categoria son"));    
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
        try {
            $c = Categories::find($id);

            if(!isset($c->id))
                return response()->json(Result::success(null,"Error la categoria no existe"));   
            
            $c->name = $request->name; 
            $c->save();

            return response()->json(Result::success(null, "Categoria Editada"));    
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

            $categoria = Categories::find($id);

            if(!isset($categoria->id))
                return response()->json(Result::success(null,"Error la categoria no existe"));   

            $categoria->delete();

            return response()->json(Result::success(null,"Categoria Eliminada de forma correcta"));    
        } catch(\Exception $e) {
            return response()->json(Result::error('Error,'.$e->getMessage())); 
        } 
    }
}

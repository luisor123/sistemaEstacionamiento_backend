<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EspacioEstacionamiento;

class EspacioEstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('espacio-estacionamiento.index');
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
    public function store(Request $request)
    {
        $model=new EspacioEstacionamiento();
        $model->codigo=$request->codigo;
        $model->nombre=$request->nombre;      
        $model->descripcion=$request->descripcion;      
        $model->estacionamiento_id=$request->estacionamiento_id;      
        $model->estado_id=1;//El estado uno es libre    
        $model->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $model=EspacioEstacionamiento::find($id);
        $model->codigo=$request->codigo;
        $model->nombre=$request->nombre;      
        $model->descripcion=$request->descripcion;      
        $model->estacionamiento_id=$request->estacionamiento_id;      
        $model->estado_id=$request->estado_id;    
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model=EspacioEstacionamiento::find($id);
        $model->delete();
    }
}

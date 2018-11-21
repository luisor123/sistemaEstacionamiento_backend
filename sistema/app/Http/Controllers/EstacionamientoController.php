<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estacionamiento;

class EstacionamientoController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        return view('estacionamiento.index');
    }

    /**
     * 
     */
    public function create()
    {
        //
    }

    /**
     *
     */
    public function store(Request $request)
    {
        $model=new Estacionamiento();
        $model->codigo=$request->codigo;
        $model->nombre=$request->nombre;
        $model->descripcion=$request->descripcion;
        $model->save();
    }

    /**
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * 
     */
    public function edit($id)
    {
        //
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        $model=Estacionamiento::find($id);
        $model->codigo=$request->codigo;
        $model->nombre=$request->nombre;
        $model->descripcion=$request->descripcion;
        $model->save();
    }

    /**
     * 
     */
    public function destroy($id)
    {
        $model=Estacionamiento::find($id);
        $model->delete();
    }
}

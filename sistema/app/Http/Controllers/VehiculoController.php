<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $buscar_placa = Vehiculo::where('placa',$request->placa)->first();
        if($buscar_placa==null){
            $model = new Vehiculo();
            $model->placa=$request->placa;
            $model->descripcion=$request->descripcion;
            $model->propietario_id=$request->propietario_id;
            $model->save();
        }else{
            $model = Vehiculo::find($buscar_placa->id);
            $model->placa=$request->placa;
            $model->descripcion=$request->descripcion;
            $model->propietario_id=$request->propietario_id;
            $model->save();
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
        //
        $model = Vehiculo::find($id);
        $model->placa=$request->placa;
        $model->descripcion=$request->descripcion;
        $model->propietario_id=$request->propietario_id;
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
        $model = Vehiculo::find($id);
        $model->delete();
    }
}

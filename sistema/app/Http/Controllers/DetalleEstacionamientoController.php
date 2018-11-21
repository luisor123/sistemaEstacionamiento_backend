<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleEstacionamiento;
use App\EspacioEstacionamiento;
use DB;

class DetalleEstacionamientoController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        //
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
        try{
            DB::beginTransaction();

            $model=new DetalleEstacionamiento();
            $model->nota=$request->nota;
            $model->salio=false;
            $model->fecha_entrada=$request->fecha_entrada;
            $model->espacio_id=$request->espacio_id;
            $model->vehiculo_id=$request->vehiculo_id;
            $model->save();

            $espacio=EspacioEstacionamiento::find($request->espacio_id);
            $espacio->estado_id=2; // EL ESTADO 2 ES OCUPADO
            $espacio->save(); 

            DB::commit();

            $notificacion = array(
                'message' => 'Gracias! La entrada del vehiculo ha sido registrada con exito.', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificacion);

        }catch(Exception $e){
            DB::rollback();
            dd($e);
        }
               
    }

    /**
     * 
     */
    public function show($id)
    {
        
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

        try{
            DB::beginTransaction();

            $model=DetalleEstacionamiento::find($id);
            $model->nota=$request->nota;
            $model->salio=true;
            $model->fecha_salida=$request->fecha_salida;
            $model->save();

            $espacio=EspacioEstacionamiento::find($request->espacio_id);
            $espacio->estado_id=1; // EL ESTADO 1 ES LIBRE
            $espacio->save(); 

            DB::commit();

            $notificacion = array(
                'message' => 'Gracias! La salida del vehiculo ha sido registrada con exito.', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificacion);

        }catch(Exception $e){
            DB::rollback();
            dd($e);
        }
    }

    /**
     * 
     */
    public function destroy($id)
    {
        $model=DetalleEstacionamiento::find($id);
        $model->delete();
    }
}

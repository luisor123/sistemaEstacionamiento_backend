<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $placa=$request->placa;
        $nombre=$request->nombre;
        $apellido=$request->apellido;

        $model=DB::table('vehiculos as ve')
                ->join('propietarios as pro','ve.propietario_id','pro.id')
                ->select('ve.id','ve.placa','ve.descripcion'
                ,'pro.nombre','pro.apellido')
                ->where('ve.placa','like','%'.$placa.'%')
                ->where('pro.nombre','like','%'.$nombre.'%')
                ->where('pro.apellido','like','%'.$apellido.'%')
                ->paginate(7);

        $data=[
            'model'=>$model,
            'placa'=>$placa,
            'nombre'=>$nombre,
            'apellido'=>$apellido
        ];

        return view('vehiculo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            //DB::beginTransaction();

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

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El vehiculo ha sido registrado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
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
        $model=DB::table('vehiculos as ve')
                ->join('propietarios as pro','ve.propietario_id','pro.id')
                ->select('ve.id','ve.placa','ve.descripcion','ve.propietario_id'
                ,'pro.nombre','pro.apellido','pro.dni')
                ->where('ve.id',$id)
                ->first();

        $data=[
            'model'=>$model
        ];

        return view('vehiculo.edit',$data);
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
        try{
            //DB::beginTransaction();

            $model = Vehiculo::find($id);
            $model->placa=$request->placa;
            $model->descripcion=$request->descripcion;
            $model->propietario_id=$request->propietario_id;
            $model->save();

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El vehiculo ha sido modificado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
        }       
        //
        
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
            //DB::beginTransaction();
            
            $model = Vehiculo::find($id);
            $model->delete();

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El vehiculo ha sido eliminado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
        }       
    }
}

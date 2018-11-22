<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propietario;

class PropietarioController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        $dni=$request->dni;
        $nombre=$request->nombre;
        $apellido=$request->apellido;

        $model = Propietario::select('id','dni','nombre','apellido')
                    ->where('dni','like','%'.$dni.'%')
                    ->where('nombre','like','%'.$nombre.'%')
                    ->where('apellido','like','%'.$apellido.'%')
                    ->paginate(7);

        $data=[
            'model'=>$model,
            'dni'=>$dni,
            'nombre'=>$nombre,
            'apellido'=>$apellido
        ];

        return view('propietario.index',$data);
    }

    /**
     * 
     */
    public function create()
    {
        return view('propietario.create');
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        try{
            //DB::beginTransaction();

            $buscar_dni=Propietario::where('dni',$request->dni)->first();

            if($buscar_dni==null){
                $model=new Propietario();
                $model->dni = $request->dni;
                $model->nombre = $request->nombre;
                $model->apellido = $request->apellido;
                $model->descripcion = $request->descripcion;
                $model->save();
            }else{
                $model=Propietario::find($buscar_dni->id);
                $model->dni = $request->dni;
                $model->nombre = $request->nombre;
                $model->apellido = $request->apellido;
                $model->descripcion = $request->descripcion;
                $model->save();
            }

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El propietario ha sido guardado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
        }       
        
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
        $model=Propietario::find($id);
        $data=[
            'model'=>$model
        ];
        return view('propietario.edit',$data);
    }

    /**
     *
     */
    public function update(Request $request, $id)
    {       

        try{
            //DB::beginTransaction();

            $model=Propietario::find($id);
            $model->dni = $request->dni;
            $model->nombre = $request->nombre;
            $model->apellido = $request->apellido;
            $model->descripcion = $request->descripcion;
            $model->save();

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El propietario ha sido modificado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
        }       
    }

    /**
     * 
     */
    public function destroy($id)
    {
        
        try{
            //DB::beginTransaction();
            
            $model=Propietario::find($id);
            $model->delete();

            //DB::commit();
            $notificacion = array(
                'message' => 'Gracias! El propietario ha sido eliminado con exito.', 
                'alert-type' => 'success'
            );
             return redirect()->back()->with($notificacion);
        }catch(Exception $e){
            //DB::rollback();
            dd($e);
        }       
    }


    //* TODAS LAS APIS */
    function buscar_por_dni($dni){
        $model = Propietario::select('id','dni','nombre','apellido')
                    ->where('dni',$dni)
                    ->first();
        return $model;
    }
}

@extends('adminlte::layouts.app')



@section('contentheader_title', 'Propietarios')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">

				<!-- Default box BUSCAR -->
				<div class="box box-primary">
					<div class="box-header with-border">
                        <h3 class="box-title">Propietarios</h3>
                        <div class="pull-right">
                            <a href="{{route('propietario.create')}}" type="button" class="btn bg-olive btn-sm">NUEVO</a>
                        </div>
                        
					</div>
					<div class="box-body">
						<form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" value="{{$dni}}" placeholder="DNI">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$nombre}}" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="{{$apellido}}" placeholder="Apellido">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
					</div>
					<!-- /.box-body -->
				</div>
                <!-- /.box BUSCAR-->
                

                <!-- Default box LISTADO -->
				<div class="box box-primary">
					<div class="box-header with-border">
                        <h3 class="box-title">Listado</h3>
                        
					</div>
					<div class="box-body">
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($model as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <td>{{$item->dni}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->apellido}}</td>
                                            <td class="text-right">
                                                
                                                <form name="eliminar{{$item->id}}" class="form-inline" action="{{route('propietario.destroy',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('propietario.edit',$item->id)}}" type="button" 
                                                    class="btn bg-orange btn-xs"><strong>MODIFICAR</strong></a>
                                                    <button type="submit" class="btn btn-danger btn-xs"><strong>ELIMINAR</strong> </button>
                                                    
                                                </form>
                                                    {{--
                                                <button type="button" 
                                                    class="btn btn-danger btn-xs" data-toggle="modal" 
                                                    data-target="#modal-eliminar-{{$item->id}}"><strong>ELIMINAR</strong></a>
                                                   --}}                                         
                                            </td>    
                                            {{--
                                            <div class="modal modal-danger fade" id="modal-eliminar-{{$item->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Eliminar propietario</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Estas seguro de elimar al propietario con dni "{{$item->dni}}"?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>

                                                            <form name="eliminar{{$item->id}}" action="{{route('propietario.destroy',$item->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" form="eliminar{{$item->id}}" class="btn btn-outline">ELIMINAR</button>
                                                            </form>
                                                            
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                --}}


                                        </tr>                                                



                                    @endforeach
                                </tbody>
                            </table>
                        </div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box LISTADO-->

			</div>
		</div>
	</div>
@endsection

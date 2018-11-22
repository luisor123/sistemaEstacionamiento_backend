@extends('adminlte::layouts.app')



@section('contentheader_title', 'Detalle estacionamiento')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">

				<!-- Default box BUSCAR -->
				<div class="box box-primary">
					<div class="box-header with-border">
                        <h3 class="box-title">Detalle estacionamiento</h3>
                        <div class="pull-right">
                            <a href="{{route('detalle-estacionamiento.create')}}" type="button" class="btn bg-olive btn-sm">NUEVO</a>
                        </div>
                        
					</div>
					<div class="box-body">
						<form class="form-inline">
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
                                        <th>Fecha entrada</th>
                                        <th>Fecha salida</th>
                                        <th>Placa</th>
                                        <th>Nombre y Apellido</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($model as $item)
                                        <tr>
                                            <th>{{$item->id}}</th>
                                            <td>{{$item->fecha_entrada}}</td>
                                            <td>{{$item->fecha_salida}}</td>
                                            <td>{{$item->placa}}</td>
                                            <td>{{$item->nombre}} {{$item->apellido}}</td>
                                            <td class="text-right">
                                                <a href="{{route('detalle-estacionamiento.show',$item->id)}}" type="button" 
                                                    class="btn bg-orange btn-xs"><strong>VER</strong></a>
                                                                                 
                                            </td>    
                                            
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

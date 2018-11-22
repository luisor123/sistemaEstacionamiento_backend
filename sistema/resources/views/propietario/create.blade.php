@extends('adminlte::layouts.app')



@section('contentheader_title', 'Propietario')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Registrar propietario</h3>
                        {{--
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
                        </div>
                        --}}
					</div>
					<div class="box-body">
						<form action="{{route('propietario.store')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="dni" class="col-sm-2 control-label">DNI</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="dni" name="dni" placeholder="DNI">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="apellido" name="apellido" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="descripcion" name="descripcion" placeholder="Descripcion">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>                            
                        </form>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

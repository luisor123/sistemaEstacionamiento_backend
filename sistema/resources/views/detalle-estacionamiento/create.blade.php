@extends('adminlte::layouts.app')



@section('contentheader_title', 'Entrada y salida')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Estacionamiento</h3>
					</div>
					<div class="box-body">
						<form action="" class="form-horizontal">
                            <div class="form-group">
                                <label for="codigo" class="col-sm-2 control-label">Codigo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="codigo" name="codigo" placeholder="Codigo">
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
                                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="descripcion" name="descripcion" placeholder="Descripcion">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" 
                                    id="cantidad" name="cantidad" placeholder="Cantidad de espacios disponibles">
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

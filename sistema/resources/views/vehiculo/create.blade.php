@extends('adminlte::layouts.app')



@section('contentheader_title', 'Vehiculo')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<!-- Default box -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Registrar vehiculo</h3>
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
						<form action="{{route('vehiculo.store')}}" method="POST" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="placa" class="col-sm-2 control-label">Placa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                    id="placa" name="placa" placeholder="Placa">
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
                                <label for="dni" class="col-sm-2 control-label">DNI Propietario</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" maxlength="8"
                                    id="dni" name="dni" placeholder="DNI">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="propietario" class="col-sm-2 control-label">Propietario</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="propietario_id" id="propietario_id">
                                    <input type="text" class="form-control" disabled
                                    id="propietario" name="propietario" placeholder="Propietario">
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


@push('scripts')
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        buscar_dni();
    });

    function buscar_dni(){
        $("#dni").keyup(function(event){
            var dni=$("#dni").val();
            if(dni.length==8){
                $.get("{{url('api/buscar-propietario-por-dni')}}/"+dni)
                .done(function(data, status){
                    if(data){
                        $("#propietario").val(data.nombre+' '+data.apellido);
                        $("#propietario_id").val(data.id);
                    }else{
                        $("#propietario").val('EL PROPIETARIO NO EXISTE');
                    }
                    
                    console.log(data);

                });
            }else{
                $("#propietario").val('Propietario');
            }
        }); 
    }
    
</script>
    
@endpush


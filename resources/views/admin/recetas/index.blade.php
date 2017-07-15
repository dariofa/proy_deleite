@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
					<a href="/admin/recetas/create">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nueva Receta">
                               <i class="fa fa-plus"></i>
                            </button>
                  </a>
						<h3 class="box-title">Todas las Receta</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<table class="table table-striped">
									<thead>
										<th>Código</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($recetas as $receta)
<tr>
	<td>
		{{ $receta->id }}
	</td>
	<td>
		{{ $receta->nombre }}
	</td>
	<td>
		{{ $receta->descripcion }}
	</td>
	<td>
	<a href="/admin/recetas/edit/{{ $receta->id }}" >
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa fa-edit"></i>
                            </button>
        </a>
		<a href="#" onclick="return confirm('¿Está seguro de eliminar el registro?')">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
        </a>
	</td>
</tr>
										@endforeach
									</tbody>
								</table>
								
							</div>
						</div>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection

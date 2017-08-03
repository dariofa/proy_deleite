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
						<a href="/admin/cajas/otrosEgresos/create/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo egreso">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  		</a>
                  <h3 class="box-title">Otros egresos caja</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-12">
								<div class="contenedor">
								<table class="table table-responsive table-striped">
									<thead>
									<th>Concepto</th>
									<th>Valor</th>
									<th>Caja</th>
									<th>Usuario</th>
									</thead>
									<tbody>
									@foreach($egresos as $egreso)
										<tr>
											<td>
												{{ $egreso->concepto }}
											</td>
											<td>
												{{ $egreso->valor }}
											</td>
											<td>
												{{ $egreso->caja_id }}
											</td>
											<td>
												{{ $egreso->user_id }}
											</td>
											<td>	
                  <a href="/admin/cajas/otrosEgresos/delete/{{ $egreso->id }}" onclick="return confirm('¿Está seguro de eliminar el registro?')">
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

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>

@endsection
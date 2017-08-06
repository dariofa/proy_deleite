@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
					<!--	<a href="/admin/cajas/create/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Agregar caja">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  		</a>-->
                  <h3 class="box-title">Movimientos Caja:: <b>{{ $caja->nombre }}</b></h3>

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
		<div id="exTab1" class="containe">	
		<ul  class="nav nav-pills">
					<li class="active">
		        <a  href="#1a" data-toggle="tab">Ingresos Pedidos</a>
					</li>
					<li><a href="#2a" id="buscarInfLabo" data-toggle="tab">Otros Ingresos</a>
					</li>
					<li><a href="#3a" id="buscarInfProf" data-toggle="tab">Pagos Bodega</a>
					</li>
		      <li><a href="#4a" id="buscarInfPerf" data-toggle="tab">Otros Pagos</a>
		      </li>
		      <!--<li><a href="#5a" id="buscarBienes" data-toggle="tab">Bienes</a>
		      </li>-->
		  		
				</ul> 
		<hr>
					<div class="tab-content clearfix">
					<!--Comienzo tab panel-->
					<div class="tab-pane active" id="1a">
					  <div class="row">
					  	<div class="col-md-12">
					  		<table class="table table-responsive table-striped" align="center">
									<thead>
									<th>Concepto</th>
									<th>Valor</th>
									<th>Fecha de Creación</th>
									<th>Usuario que Ingresó</th>
									<th width="30%">Acciones</th>
									</thead>
									<tbody>
									@foreach($caja->ingresos_caja as $ingreso)
									<tr>
									
										<td>
											Pago factura:: <a href="/admin/tienda/pedidos/view/{{ $ingreso->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Ver informacion del pedido"><b>{{ ($ingreso->num_factura) }}</b></a>
										</td>
										<td>
											<b>{{ ($ingreso->valor) }}</b>
										</td>
										<td>
											<b>{{ ($ingreso->pivot->created_at) }}</b>
										</td>
										<td>
										@foreach($ingreso->users as $user)
										{{ $user->name }}
										@endforeach											
										</td>
										<td>
											<a href="#" class="btn btn-success">Editar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								</table>
					  	</div>
					  </div>							
					</div>
					<!--Fin tab panel-->

					<!--Comienzo tab panel 4-->
	 						<div class="tab-pane" id="2a">
								<table class="table table-responsive table-striped" align="center">
									<thead>
									<th>Concepto</th>
									<th>Valor</th>
									<th>Fecha de Creación</th>
									<th>Usuario que Ingresó</th>
									<th width="30%">Acciones</th>
									</thead>
									<tbody>
									@foreach($caja->otros_ingresos_caja as $ingres)
									<tr>
									<td>
											Pago Producto:: <a href="/admin/tienda/pedidos/view/{{ $ingres->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Ver informacion del Producto"><b>{{ ($ingres->concepto) }}</b></a>
									</td>
										<td>
											<b>{{ ($ingres->valor) }}</b>
										</td>
										<td>
											<b>{{ ($ingres->created_at) }}</b>
										</td>
										<td>
										
											<b>{{ ($ingres->user->name) }}</b>
										
																					
										</td>
										<td>
											<a href="#" class="btn btn-success">Editar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								</table>
					  		</div>
					<!--Fin tab panel--> 


					<!--Comienzo tab panel 3-->
	 						<div class="tab-pane" id="3a">
								<table class="table table-responsive table-striped" align="center">
									<thead>
									<th>Concepto</th>
									<th>Valor</th>
									<th>Fecha de Creación</th>
									<th>Usuario que Ingresó</th>
									<th width="30%">Acciones</th>
									</thead>
									<tbody>
									@foreach($caja->egresos_caja as $egreso)
									<tr>
									

										<td>
											Pago Producto:: <a href="/admin/tienda/pedidos/view/{{ $egreso->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Ver informacion del Producto"><b>{{ ($egreso->nombre) }}</b></a>
										</td>
										<td>
											<b>{{ ($egreso->precio) }}</b>
										</td>
										<td>
											<b>{{ ($egreso->pivot->created_at) }}</b>
										</td>
										<td>
										@foreach($ingreso->users as $user)
										{{ $user->name }}
										@endforeach											
										</td>
										<td>
											<a href="#" class="btn btn-success">Editar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								</table>
					  		</div>
					<!--Fin tab panel-->  		

					<!--Comienzo tab panel 4-->
	 						<div class="tab-pane" id="4a">
								<table class="table table-responsive table-striped" align="center">
									<thead>
									<th>Concepto</th>
									<th>Valor</th>
									<th>Fecha de Creación</th>
									<th>Usuario que Ingresó</th>
									<th width="30%">Acciones</th>
									</thead>
									<tbody>
									@foreach($caja->otros_egresos_caja as $egreso)
									<tr>
									

										<td>
											Pago Producto:: <a href="/admin/tienda/pedidos/view/{{ $egreso->id }}" data-toggle="tooltip" data-placement="top" data-original-title="Ver informacion del Producto"><b>{{ ($egreso->concepto) }}</b></a>
										</td>
										<td>
											<b>{{ ($egreso->valor) }}</b>
										</td>
										<td>
											<b>{{ ($egreso->created_at) }}</b>
										</td>
										<td>
										
											<b>{{ ($egreso->user->name) }}</b>
										
																					
										</td>
										<td>
											<a href="#" class="btn btn-success">Editar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								</table>
					  		</div>
					<!--Fin tab panel-->  		


				</div>
		</div>			  
											
								
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
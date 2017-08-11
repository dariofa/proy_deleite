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
						
						<a href="/admin/clientes/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo pedido">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  </a>
                  <h3 class="box-title">Pedidos</h3>

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
									<th>Fecha del Pedido</th>
									<th>Valor</th>
									<th>Estado</th>
									<th>Cliente</th>
									<th width="30%">Acciones</th>
									</thead>
									<tbody>
										@foreach($pedidos as $pedido)
										<tr>
											<td>
												{{ $pedido->created_at }}
											</td>
											<td>
												{{ $pedido->valor }}
											</td>
											<td>
												{{ $pedido->estado }}
											</td>
											<td>
											{{ $pedido->cliente->nombre }}
											</td>
																		
											<td>
					<a href="/admin/tienda/pedidos/view/{{ $pedido->id }}">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Sacar Pedido">
                               <i class="fa  fa-minus-circle"></i><label for="" class="hidden-xs">Sacar</label>
                            </button>
                  </a>
					<a href="/admin/tienda/pedidos/edit/{{ $pedido->id }}">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa fa-edit"></i>Editar
                            </button>
                  </a>
                  <a href="/admin/tienda/pedidos/delete/{{ $pedido->id }}" onclick="return confirm('¿Está seguro de eliminar el registro?')">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>Eliminar
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregando existencias</h4>
        <h4>Existencias actuales::</h4>
      </div>
      {!! Form::open(['route' => ['admin.tienda.producto.add.stock'], 'method' => 'post']) !!}		{!! Form::hidden('id',null,['class'=>'form-control','id'=>'pedido_id']) !!}
      <div class="modal-body">
		{!! Form::label('stock','Nueva existencia') !!}
        {!! Form::text('stock',null,['class'=>'form-control','id'=>'precio']) !!}
		   
		

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Agregar',['class'=>'btn btn-warning']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection

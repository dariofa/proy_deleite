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
						
						<a href="/admin/tienda/producto/create/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo Producto">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  </a>
                  <h3 class="box-title">Tienda</h3>

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
								<table class="table table-responsive table-striped" id="table-prod">
									<thead>
									<th>Productos</th>
									<th>Libras</th>
									<th>Latas</th>
									<th>Prod. Aprox</th>
									<th width="10%">Prod. Uni</th>
									<th>Guardar Producido</th>
									</thead>
									<tbody> 


										@foreach($pedidos as $pedido)

											
			
										<tr>
											<td>
											{!! Form::hidden('producto_tienda_id',$pedido->producto_tienda_id,['class'=>'form-contro','id'=>'producto_tienda_id'.$pedido->producto_tienda_id]) !!}
												{{ ($pedido->nombre) }}
											</td>

											<td>
									
													{{ (($pedido->total)) }}
										
												
											</td>
											<td>

												{{ ((($pedido->cantidad)/20)) }}
											</td> 

											<td>
									
													{{ (($pedido->cantidad)) }}
					{!! Form::hidden('pedido_cantidad',$pedido->cantidad,['class'=>'form-contro','id'=>'pedido_cantidad'.$pedido->producto_tienda_id]) !!}
												
											</td>
											
				
				@if(!$pedido->estado == 'producido')
			<td>
			{!! Form::text('stock',null,['class'=>'form-control','id'=>'stock'.$pedido->producto_tienda_id]) !!}
			</td>
			<td>
				{!! Form::button('Agregar',['class'=>'btn btn-warning','onclick'=>'addProduccion('.$pedido->producto_tienda_id.')']) !!}
			</td>
			@else
			<td>
				<label id="label-info{{ $pedido->producto_tienda_id }}" class="label label-info">{{ $pedido->cantidad_prod }}</label>	
				{!! Form::hidden('stock',$pedido->cantidad_prod,['class'=>'form-control','id'=>'stock'.$pedido->producto_tienda_id]) !!}
				{!! Form::text('new_stock',null,['style'=>'display:none','class'=>'form-control','id'=>'new_stock'.$pedido->producto_tienda_id]) !!}					
			</td>
			<td>
				{!! Form::button('Editar',['class'=>'btn btn-primary','onclick'=>'toggleUpd('.$pedido->producto_tienda_id.')','id'=>'btnOpUpdate'.$pedido->producto_tienda_id]) !!}

				{!! Form::button('Cancelar',['style'=>'display:none','class'=>'btn btn-warning','onclick'=>'toggleUpd('.$pedido->producto_tienda_id.')','id'=>'btnCloUpdate'.$pedido->producto_tienda_id]) !!}

				{!! Form::button('Actualizar',['style'=>'display:none','class'=>'btn btn-success','onclick'=>'updateCanProd('.$pedido->producto_tienda_id.')','id'=>'btnUpdate'.$pedido->producto_tienda_id]) !!}
			</td>
				@endif			

			
											
											
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
      {!! Form::open(['route' => ['admin.tienda.producto.add.stock'], 'method' => 'post']) !!}		{!! Form::hidden('id',null,['class'=>'form-control','id'=>'producto_id']) !!}
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

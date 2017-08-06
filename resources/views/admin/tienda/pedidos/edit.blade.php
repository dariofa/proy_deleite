@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
					<a href="/admin/recetas/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Ir al Menú">
                               <i class="fa fa-home"></i>
                            </button>
                  </a>
						<h3 class="box-title">Nueva Pedido</h3>

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
								<div class="form">
				{!! Form::open(['route' => 'admin.tienda.pedidos.store', 'method' => 'post']) !!}
					{!! form::hidden('pedido_id',$pedido->id,['id'=>'pedido_id']) !!}
				<table class="table">
					<tr>
						<td><label for="">Factura No</label></td>
						<td><label for=""><b>{{ $pedido->num_factura }} </b> </label></td>
					</tr>
					
					<tr>
						<td><label for="">Fecha del Pedido</label></td>
						<td><label for="">{{ date('d-m-Y h:i:s A') }}</label></td>
					</tr>
					<tr>
						<td><label for="">Cliente</label></td>
						<td>
						{!! form::hidden('cliente_id',$pedido->cliente->id) !!}
						<label for="">{{ $pedido->cliente->nombre }}</label></td>
					</tr>
					
					<tr>
						<td><label for="">Total a Pagar</label></td>
						<td> $ <label id="valorToPed">{{ $pedido->valor }}</label>
							{{ Form::hidden('valor',$pedido->valor,['id'=>'valor_total_pedido']) }}
						</td>
					</tr>
					<tr>
					<td>
						{!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}
					</td>
				</tr>
				</table>	
				<table>
				<th>
					Producto
				</th>
				<th>
					Valor Unit
				</th>
				<th>
					Valor
				</th>
				<th>
					Cant. Aprox
				</th>
				<th>
					Acciones
				</th>
				
					 	@foreach($pedido->productos as $product)
                <tr>
                	<td>
                		<select disabled name="productos[]" class="form-control" id="producto_id{{ $product->id }}">
	                		@foreach($productos_tienda as $producto)
								<option <?php if($producto->id == $product->id ) echo 'selected' ?> value="{{ $producto->id }}">{{ $producto->receta->nombre }}</option>
	                		@endforeach
	                	</select>
                	</td>
                	<td>
                		<input type="text" name="precio[]" readonly value="{{ $product->precio }}" class="form-control" id="precio{{ $product->id }}">
                	</td>
                	<td>
                		<input type="text" id="valor{{ $product->id }}" name="valor[]" onblur="calcToPed({{ $product->id }})" required class="form-control cantidadPro" value="{{ $product->pivot->valor }}">
                	</td>
                	<td>
                		<input type="text" name="cantAprox[]" readonly class="form-control" id="cantAprox{{ $product->id }}" value="{{ $product->pivot->cantidad_aprox }}">

                	</td>
                	<td>
                		<a class="input-group-addon btn-upd-prod" id="basic-addon2" onclick="updateProdPedido({{ $product->id }},{{ $pedido->id }})" data-toggle="tooltip" data-placement="top" data-original-title="Actualizar"><i class="fa fa-edit"></i></a>

                	
                		<a href="/admin/tienda/pedido/producto/delete/{{ $product->id }}/{{ $pedido->id }}" class="input-group-addon btn-del-prod" id="basic-addon2" onclick="return confirm('¿Está seguro de eliminar el registro..')" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-trash"></i></a>  

                	</td>
                </tr>					      	
	                	
          @endforeach
				</table>
                <hr>
                <div class="content-add-ingr" id="nodo">
                <label id="labProd">Productos</label> 
                <label id="labValUnit">Valor Unit</label>
                <label id="labVal">Valor</label>                
				<label id="labCantAprox">Cant Aprox</label>	
				
                	<div class="input-group">
                	 <span class="input-group-addon btn-add-prod" id="basic-addon2" onclick="searchProdTienda(2)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto"><i class="fa fa-plus"></i>Agregar un nuevo producto</span>
<!--
					  <span class="input-group-addon btn-minus-prod" id="basic-addon2" data-toggle="tooltip" data-placement="top" data-original-title="Quitar Producto"><i class="fa fa-minus-circle minus"></i></span>-->
					</div>
                </div>
                
               
                <hr>
                
                {!! Form::close() !!}
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

@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

<?php $bandera = true ?>
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
					<a href="/admin/tienda/pedidos">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Ir al Menú">
                               <i class="fa fa-home"></i>
                            </button>
                  </a>
						<h3 class="box-title">Salida de Pedidos</h3>

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
				{!! Form::open(['route' => 'admin.tienda.pedido.deliver', 'method' => 'post']) !!}
					{!! form::hidden('pedido_id',$pedido->id,['id'=>'pedido_id']) !!}
				<table class="table">
					<tr>
						<td><label for="">Factura No</label></td>
						<td><label for=""><b>{{ $pedido->num_factura }} </b> </label></td>
					</tr>
					<tr>
						<td><label for="">Enviar a caja</label></td>
						<td>{!! Form::select('caja_id',$cajas,null,['class'=>'form-control']) !!}</td>
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
						<td> $ <label id="valor_total_pedido">{{ $pedido->valor }}</label>
							{{ Form::hidden('valor_total_pedido',$pedido->valor,['id'=>'valor_total_pedido']) }}
						</td>
					</tr>
					<tr>
					<td>
						
					</td>
				</tr>
				</table>	
				<table class="table">
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
					Cantidad
				</th>
				<th></th>
				
				
					 	@foreach($pedido->productos as $product)
                <tr>
                	<td>
                	<select  hidden name="producto_id[]" class="form-contro" id="producto_id{{ $product->id }}">
	                		@foreach($productos_tienda as $producto)
								<option <?php if($producto->id == $product->id ) echo 'selected' ?> value="{{ $producto->id }}">{{ $producto->receta->nombre }}</option>
	                		@endforeach
	                	</select>
	                {{ ($product->receta->nombre) }}	
                	</td>
                	<td>
              <input type="text" hidden name="precio[]" readonly value="{{ $product->precio }}" class="form-contro" id="precio{{ $product->id }}">
                		{{ $product->precio }}
                	</td>
                	<td>
                		<input type="text" hidden id="valor{{ $product->id }}" name="valor[]" onblur="calcToPed({{ $product->id }})" required class="form-contro cantidadPro" value="{{ $product->pivot->valor }}">
                		{{ $product->pivot->valor }}
                	</td>
                	<td>
                		<input type="text" hidden name="cantAprox[]" readonly class="form-contro" id="cantAprox{{ $product->id }}" value="{{ $product->pivot->cantidad_aprox }}">
{{ $product->pivot->cantidad_aprox }}


                	</td>
                	<td>
                	@if($product->pivot->cantidad_aprox > $product->stock)                	
                		<a class="icon-help" ><i onmouseover="javascript:open_Help({{ $product->id }},'div-danger')" onmouseout="close_Help({{ $product->id }},'div-danger')" class="fa fa-ban color-danger" ></i><div style="display: none" id="div-help{{ $product->id }}">Cantidades disponibles:: <b>{{ $product->stock }}; NO </b>se puede entregar el pedido</div></a>
                	<?php $bandera = false ?>	
                	@else
                		<a class="icon-help" ><i onmouseover="javascript:open_Help({{ $product->id }},'div-success')" onmouseout="close_Help({{ $product->id }},'div-success')" class="fa fa-check-circle-o color-success" ></i><div style="display: none" id="div-help{{ $product->id }}">Cantidades disponibles:: <b>{{ $product->stock }}</b>	 ; Se puede entregar el pedido</div></a>

                	@endif	
                	</td>              
                </tr>	                	
          @endforeach
				</table>
          <hr>
          @if($bandera)
          {!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}                
          @endif
                {!! Form::close() !!}
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

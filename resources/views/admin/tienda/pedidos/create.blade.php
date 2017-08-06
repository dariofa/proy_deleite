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
					
				<table class="table">
					<tr>
					<?php $num_factura = time(); ?>
						<td><label for="">Factura No</label></td>
						<td><label for=""><b>{{ $num_factura }} </b> </label></td>
						{!! form::hidden('num_factura',$num_factura) !!}
					</tr>
					<tr>
						<td><label for="">Vendedor</label></td>
						<td>{!! form::hidden('user_id',Auth::user()->id) !!}
						<label for="">{{ Auth::user()->name }} </label></td>
					</tr>
					<tr>
						<td><label for="">Fecha del Pedido</label></td>
						<td><label for="">{{ date('d-m-Y h:i:s A') }}</label></td>
					</tr>
					<tr>
						<td><label for="">Cliente</label></td>
						<td>
						{!! form::hidden('cliente_id',$cliente->id) !!}
						<label for="">{{ $cliente->nombre }}</label></td>
					</tr>
					
					<tr>
						<td><label for="">Total a Pagar</label></td>
						<td> $ <label id="valorToPed">0</label>
							{{ Form::hidden('valor',null,['id'=>'valor']) }}
						</td>
					</tr>
				</table>	

                <hr>
                <div class="content-add-ingr" id="nodo">
                <label id="labProd">Productos</label> 
                <label id="labValUnit">Valor Unit</label>
                <label id="labVal">Valor</label>                
				<label id="labCantAprox">Cant Aprox</label>	
				
                	<div class="input-group">
                	<!--	<div class="help" id="help">
                		@foreach($productos_tienda as $producto)
							Existencias disponibles:: {{ $producto->stock }}</option>
	                		@endforeach
                			
                		</div>
                		<i class="fa fa-question-circle pull-left icon " id="btn-help" ></i>-->
                	
	                	<select   name="productos[]" id="producto0" class="form-control  inp-add-pro-ti tip_prod" required onchange="searchPrTieStock(0)">
	                	
	                		@foreach($productos_tienda as $producto)
								<option value="{{ $producto->id }}">{{ $producto->receta->nombre }}</option>
	                		@endforeach
	                	</select>
	                	<input type="text" name="valorUn[]" readonly class="form-control inp-val-uni-pr valUnit" id="valUnit0">
	                	<input type="text" id="cantidad0" name="cantidad[]" onblur="calcToPed(0)" required class="form-control inp-add-gra-ti cantidadPro">

	                	<input type="text" name="cantAprox[]" readonly class="form-control inp-cant-aprox-pr valUnit" id="cantAprox0">

					  <span class="input-group-addon btn-add-prod" id="basic-addon2" onclick="searchProdTienda(1)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto"><i class="fa fa-plus"></i></span>
<!--
					  <span class="input-group-addon btn-minus-prod" id="basic-addon2" data-toggle="tooltip" data-placement="top" data-original-title="Quitar Producto"><i class="fa fa-minus-circle minus"></i></span>-->
					</div>
                </div>
                
               
                <hr>
                {!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}
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

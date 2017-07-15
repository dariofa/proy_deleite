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
						<h3 class="box-title">Nueva Receta</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="form">
				{!! Form::open(['route' => ['admin.recetas.update',$receta->id], 'method' => 'post']) !!}

                {!! Form::label('nombre','Nombre del Producto/Receta') !!}
                {!! Form::text('nombre',$receta->nombre,['class'=>'form-control','required']) !!}

                {!! Form::label('descripcion','Descripción') !!}
                {!! Form::textarea('descripcion',$receta->descripcion,['class'=>'form-control','rows'=>'3']) !!}
                <hr>
                
                {!! Form::submit('Registrar',['class'=>'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
                <hr>
                <div class="alert alert-warning" style="display: none" id="alert">El ingrediente ya existe</div>
                <div class="content-add-ingr" id="nodo">
                <label for="">Ingredientes</label>
                <label for="" class="pull-right" style="margin-right: 70px">Gramos</label>
                	<input type="text" value="{{ $receta->id }}"  class="inp-add-gra" name="receta_id" id="receta_id" hidden="hidden" >
@foreach($receta->productos as $product)
                	<div class="content-add-ingr">
                		<div class="input-group">

	                	<select disabled name="productos[]" id="sel" class="form-control cajas inp-add-pro" id="producto_id{{ $product->id }}">
	                		@foreach($productos_bodega as $producto)
		 						<option <?php if($producto->id == $product->id ) echo 'selected' ?> value="{{ $producto->id }}">{{ $producto->nombre }}</option>
							 @endforeach
	                	</select>
	                	<input type="text" value="{{ $product->pivot->cantidad_gr }}" name="gramos[]" class="form-control inp-add-gra" id="gramos{{ $product->id }}">

	                	<a class="input-group-addon btn-upd-prod" id="basic-addon2" onclick="updateProdBod({{ $product->id }})" data-toggle="tooltip" data-placement="top" data-original-title="Actualizar"><i class="fa fa-edit"></i></a>

	                	<a href="/admin/recetas/producto/delete/{{ $receta->id }}/{{ $product->id }}" class="input-group-addon btn-del-prod" id="basic-addon2" onclick="deleteProdBod({{ $product->id }})" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-trash"></i></a>  
<!--
					  <span class="input-group-addon btn-minus-prod" id="basic-addon2" data-toggle="tooltip" data-placement="top" data-original-title="Quitar Producto"><i class="fa fa-minus-circle minus"></i></span>-->
					</div>
                	</div>
          @endforeach     	
<span class="input-group-addon btn-add-prod-edit" id="basic-addon2" onclick="searchProdBod(2)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto"><i class="fa fa-plus"></i></span>
                	


                </div>
                
               
                <hr>
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

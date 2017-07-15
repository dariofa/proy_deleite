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
				{!! Form::open(['route' => 'admin.recetas.store', 'method' => 'post']) !!}

                {!! Form::label('nombre','Nombre del Producto/Receta') !!}
                {!! Form::text('nombre',null,['class'=>'form-control','required']) !!}

                {!! Form::label('descripcion','Descripción') !!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3','required']) !!}
                <hr>
                <div class="content-add-ingr" id="nodo">
                <label for="">Ingredientes</label>
                <label for="" class="pull-right" style="margin-right: 70px">Gramos</label>
                	<div class="input-group">
	                	<select  name="productos[]" id="sel" class="form-control cajas inp-add-pro" required>
	                		@foreach($productos_bodega as $producto)
		 						<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
							 @endforeach
	                	</select>
	                	<input type="text" name="gramos[]" required class="form-control inp-add-gra">
					  <span class="input-group-addon btn-add-prod" id="basic-addon2" onclick="searchProdBod(1)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto"><i class="fa fa-plus"></i></span>
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

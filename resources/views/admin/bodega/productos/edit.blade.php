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
					<a href="/admin/bodega/producto/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Ir al Menú">
                               <i class="fa fa-home"></i>
                            </button>
                  </a>
						<h3 class="box-title">Actualizar</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						
						<div class="row">
							<div class="col-md-7">
								<div class="form">
				{!! Form::open(['route' => ['admin.bodega.producto.update',$producto_bodega->id], 'method' => 'post']) !!}

                {!! Form::label('nombre','Nombre del Producto') !!}
                {!! Form::text('nombre',$producto_bodega->nombre,['class'=>'form-control']) !!}

                {!! Form::label('precio','Precio') !!}
                {!! Form::text('precio',$producto_bodega->precio,['class'=>'form-control']) !!}

                {!! Form::label('peso_kg','Peso en Kg') !!}
                {!! Form::text('peso_kg',$producto_bodega->peso_kg,['class'=>'form-control']) !!}

                {!! Form::label('peso_gr','Peso en Gr') !!}
                {!! Form::text('peso_gr',$producto_bodega->peso_gr,['class'=>'form-control']) !!}

                {!! Form::label('descripcion','Descripción') !!}
                {!! Form::textarea('descripcion',$producto_bodega->descripcion,['class'=>'form-control','rows'=>'3']) !!}
                <hr>
                {!! Form::submit('Actualizar',['class'=>'btn btn-warning btn-block']) !!}
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

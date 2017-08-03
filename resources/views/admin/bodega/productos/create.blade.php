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
						<h3 class="box-title">Nuevo Producto</h3>

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
				{!! Form::open(['route' => 'admin.bodega.producto.store', 'method' => 'post']) !!}

                {!! Form::label('caja_id','Descontar de caja') !!}
                {!! Form::select('caja_id',$cajas,null,['class'=>'form-control']) !!}

                {!! Form::label('nombre','Nombre del Producto') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                {!! Form::label('precio','Precio') !!}
                {!! Form::text('precio',null,['class'=>'form-control']) !!}

                {!! Form::label('peso_kg','Peso en Kg') !!}
                {!! Form::text('peso_kg',null,['class'=>'form-control','id'=>'peso_kg']) !!}

                {!! Form::label('peso_gr','Peso en Gr') !!}
                {!! Form::text('peso_gr',null,['class'=>'form-control','id'=>'peso_gr']) !!}

                {!! Form::label('descripcion','Descripción') !!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3']) !!}
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

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
					<a href="/admin/clientes/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Ir al Menú">
                               <i class="fa fa-home"></i>
                            </button>
                  </a>
						<h3 class="box-title">Nuevo Cliente</h3>

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
				{!! Form::open(['route' => 'admin.clientes.store', 'method' => 'post']) !!}

                {!! Form::label('nombre','Nombre del Cliente') !!}
                {!! Form::text('nombre',null,['class'=>'form-control']) !!}

                {!! Form::label('direccion','Direccion') !!}
                {!! Form::text('direccion',null,['class'=>'form-control']) !!}

                {!! Form::label('telefono','Teléfono') !!}
                {!! Form::text('telefono',null,['class'=>'form-control','id'=>'tel']) !!}
				
				{{!!Form::label('descuento', 'Descuento')!!}}
                {!! Form::select('descuento', [''=>'Seleccione el descuento...', '12'=>'12%', '15'=>'15%'], null,[class => 'form-control']!!}
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

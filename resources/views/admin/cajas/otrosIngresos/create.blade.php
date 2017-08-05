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
					
                  <h3 class="box-title">Otros ingresos caja</h3>

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
								<div class="form-group">
									{!!Form::open(['route' => 'admin.cajas.otrosIngresos.store', 'method' => 'POST'])!!}

										{!! Form::label('caja_id','Agregar a la caja') !!}
                						{!! Form::select('caja_id',$cajas,null,['class'=>'form-control']) !!}

										{!!Form::label('concepto','Concepto')!!}
										{!!Form::text('concepto',null,['class'=>'form-control','placeholder'=>'Concepto ingreso'],'required')!!}
										{!!Form::label('valor','Valor')!!}
										{!!Form::text('valor',null,['class'=>'form-control','placeholder'=>'valor ingreso'],'required')!!}
										<hr>
										<div class="form-group text-center">
											{!!Form::submit('Ingresar',['class'=>'btn btn-primary'])!!}
										</div>

									{!!Form::close()!!}
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
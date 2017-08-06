@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						
						<a href="/admin/clientes/create/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo cliente">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  </a>
                  <h3 class="box-title">Clientes</h3>

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
								<table class="table table-responsive table-striped table-clientes">
									<thead>
									<th>Nombre del Cliente</th>
									<th>Dirección</th>
									<th>Teléfono</th>
									<th>Descuento</th>
									<th>Canastillas Prestadas</th>
									<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($clientes as $cliente) 
										<tr>
											<td>
												{{ $cliente->nombre }}
											</td>
											<td>
												{{ $cliente->direccion }}
											</td>
											<td>
												{{ $cliente->telefono }}
											</td>
											<td>
												{{ $cliente->descuento }}
											</td>
											<td>
											@foreach($cliente->canastillas as $canastilla)
												{{ ($canastilla->pivot->cantidad_prestadas) }}
												@break
												@endforeach

											</td>
											<td>
					<a href="/admin/tienda/pedidos/create/{{ $cliente->id }}">
                       		<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo Pedido">
                               <i class="fa  fa-calendar"></i>
                            </button>
                  </a>						

					<a href="#" data-toggle="modal" data-target="#myModal" onclick="sendId({{ $cliente->id}})">
                       		<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Asignar canastillas">
                               <i class="fa  fa-plus-circle"></i>
                            </button>
                  </a>				
					<a href="/admin/clientes/edit/{{ $cliente->id }}">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa fa-edit"></i>
                            </button>
                  </a>
                  <a href="/admin/clientes/delete/{{ $cliente->id }}" onclick="return confirm('¿Está seguro de eliminar el registro?')">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                  </a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $clientes->render() }}
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
        <h4 class="modal-title" id="myModalLabel">Asignando Canastillas</h4>      </div>
      {!! Form::open(['route' => ['admin.canastillas.assign'], 'method' => 'post']) !!}	
      {!! Form::hidden('id',null,['class'=>'form-control','id'=>'producto_id']) !!}
      <div class="modal-body">

     {!! Form::select('canastilla_id',$canastillas, null, ['class' => 'form-control'])!!}

     {!! Form::label('cantidad','Cantidad') !!}
     {!! Form::number('cantidad',null,['class'=>'form-control','id'=>'cant_canastilla','required']) !!}

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Asignar',['class'=>'btn btn-warning']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection
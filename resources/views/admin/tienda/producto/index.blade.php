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
						
						<a href="/admin/tienda/producto/create/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo Producto">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  </a>
                  <h3 class="box-title">Tienda</h3>

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
								<table class="table table-responsive table-striped">
									<thead>
									<th>Nombre del Producto</th>
									<th>Precio</th>
									<th>Existencia</th>
									<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($productos_tienda as $producto)
										<tr>
											<td>
												{{ $producto->receta->nombre }}
											</td>
											<td>
												{{ $producto->precio }}
											</td>
											<td>
												{{ $producto->stock }}
											</td>
																		
											<td>
					<a href="#" data-toggle="modal" data-target="#myModal" onclick="sendId({{ $producto->id }})">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Existencia">
                               <i class="fa  fa-plus-circle"></i>
                            </button>
                  </a>
					<a href="/admin/tienda/producto/edit/{{ $producto->id }}">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa fa-edit"></i>
                            </button>
                  </a>
                  <a href="/admin/tienda/producto/delete/{{ $producto->id }}" onclick="return confirm('¿Está seguro de eliminar el registro?')">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                  </a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $productos_tienda->render() }}
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
        <h4 class="modal-title" id="myModalLabel">Agregando existencias</h4>
        <h4>Existencias actuales::</h4>
      </div>
      {!! Form::open(['route' => ['admin.tienda.producto.add.stock'], 'method' => 'post']) !!}		{!! Form::hidden('id',null,['class'=>'form-control','id'=>'producto_id']) !!}
      <div class="modal-body">
		{!! Form::label('stock','Nueva existencia') !!}
        {!! Form::text('stock',null,['class'=>'form-control','id'=>'precio']) !!}
		   
		

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Agregar',['class'=>'btn btn-warning']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection

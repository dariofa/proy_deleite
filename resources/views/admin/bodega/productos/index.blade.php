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
						
						<a href="/admin/bodega/producto/crear/">
                            <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Nuevo Producto">
                               <i class="fa fa-plus-square"></i>
                            </button>
                  </a>
                  <h3 class="box-title">Bodega</h3>

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
									<th>Existencia en Kg</th>
									<th>Existencia en Gr</th>
									<th>Descripción</th>
									<th>Acciones</th>
									</thead>
									<tbody>
										@foreach($productos_bodega as $producto)
										<tr>
											<td>
												{{ $producto->nombre }}
											</td>
											<td>
												{{ $producto->precio }}
											</td>
											<td>
												{{ $producto->peso_kg }}
											</td>
											<td>
												{{ $producto->peso_gr }}
											</td>
											<td>
												{{ $producto->descripcion }}
											</td>
											<td>
					<a href="#" data-toggle="modal" data-target="#myModal" onclick="sendId({{ $producto->id }})">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Existencia">
                               <i class="fa  fa-plus-circle"></i>
                            </button>
                  </a>
					<a href="/admin/bodega/producto/edit/{{ $producto->id }}">
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                               <i class="fa fa-edit"></i>
                            </button>
                  </a>
                  <a href="/admin/bodega/producto/delete/{{ $producto->id }}" onclick="return confirm('¿Está seguro de eliminar el registro?')">
                            <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">
                               <i class="fa fa-trash"></i>
                            </button>
                  </a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								{{ $productos_bodega->render() }}
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
        <h4 class="modal-title" id="myModalLabel">Actualizando</h4>
      </div>
      {!! Form::open(['route' => ['admin.bodega.producto.stock.update'], 'method' => 'post']) !!}		{!! Form::hidden('id',null,['class'=>'form-control','id'=>'producto_id']) !!}
      <div class="modal-body">
      	{!! Form::label('caja_id','Descontar de caja') !!}
        {!! Form::select('caja_id',$cajas,null,['class'=>'form-control']) !!}
		{!! Form::label('precio','Precio') !!}
        {!! Form::text('precio',null,['class'=>'form-control','id'=>'precio']) !!}
		{!! Form::label('peso_kg','Agregar en Kilogramos') !!}
        {!! Form::text('peso_kg',null,['class'=>'form-control','id'=>'peso_kg']) !!}
       {!! Form::label('peso_gr','Agregar en Gramos') !!}
        {!! Form::text('peso_gr',null,['class'=>'form-control','id'=>'peso_gr']) !!}             
		

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

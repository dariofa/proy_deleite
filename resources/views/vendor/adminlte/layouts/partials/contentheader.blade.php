<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid spark-screen ">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
					<div class="box-header with-border">
						{{-- @if(!isset($ocultar)) --}}
                        <div class="btn-group">
                            <!--Productos-->
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class='fa fa-cubes'></i> Bodega<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="/admin/bodega/producto/">Ver productos</a></li>
                            <li><a href="/admin/bodega/producto/crear/">Agregar producto</a></li>
                            </ul>
                        </div>
                            <!--Pedidos-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class='fa fa-edit'></i>Pedidos<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="/admin/tienda/pedidos/">Ver pedidos</a></li>
                            <li><a href="/admin/clientes/">Agregar pedido</a></li>
                            </ul>
                        </div>
                        <!--Clientes-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class='fa fa-user-circle'></i>Clientes<span class="caret"></span></button>
 
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/clientes/">Ver clientes</a></li>
                                <li><a href="/admin/clientes/create/">Agregar cliente</a></li>
                            </ul>
                        </div>
                        <!--Caja-->
                        <div class="btn-group" >
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class='fa fa-dollar'></i>Caja<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a class="hover" href="/admin/cajas">Ver</a></li>
                            <li class="hover"><a class="hover" href="/admin/cajas/create/">Agregar</a></li>                            
                            <li><a class="hover" href="/admin/cajas/otrosEgresos/create">Otros Egresos</a></li>
                            <li><a class="hover" href="/admin/cajas/otrosIngresos/create">Otros Ingresos</a></li>
                            </ul>
                        </div>
                        {{-- @else
                        
                        <h3>Welcome-</h3>

                        @endif --}}

                        
                    </div>
                </div>
            </div>
        </div>
    </div> 

</section>

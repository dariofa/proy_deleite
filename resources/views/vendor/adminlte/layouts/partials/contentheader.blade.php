<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid spark-screen ">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box">
					<div class="box-header with-border">
						<h2>
        				@yield('contentheader_title', 'Administración')
        				<small>@yield('contentheader_description')</small>
    					</h2>
    					<hr>
                        <div class="btn-group">
                            <!--Productos-->
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class='fa fa-cubes'></i>Productos<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="/admin/bodega/producto/">Ver productos</a></li>
                            <li><a href="/admin/bodega/producto/crear/">Agregar producto</a></li>
                            </ul>
                        </div>
                            <!--Pedidos-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class='fa fa-edit'></i>Pedidos<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="/admin/pedidos/">Ver pedidos</a></li>
                            <li><a href="/admin/pedidos/create/">Agregar pedido</a></li>
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class='fa fa-dollar'></i>Caja<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="/admin/cajas/create/" style="hover:'red'">Agregar caja</a></li>
                            <li><a href="/admin/cajas">Ver cajas</a></li>
                            <li><a href="/admin/cajas/otrosEgresos">Otros egresos cajas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

</section>
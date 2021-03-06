<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            
            <li class="treeview">
                <a href="#"><i class='fa fa-cog'></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa fa-cubes'></i> <span>Bodega</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/bodega/producto/">Ver Todos los Productos</a>
                    </li>
                    <li>
                    <a href="/admin/bodega/producto/crear">Agregar un Producto</a>
                    </li> 
                </ul>
                
            </li>  
                    </li>
                    
                </ul><!-- /.treeview-menu (bodega) -->

                <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Recetas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/recetas/">Ver Todos las Recetas</a>
                    </li>
                    <li>
                    <a href="/admin/recetas/create">Agregar una Receta</a>
                    </li>
                </ul>

            </li>  
             </li> 
             </ul>
                <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa fa-user-circle'></i> <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/clientes/">Ver Todos los Clientes</a>
                    </li>
                    <li>
                    <a href="/admin/clientes/create">Agregar un Cliente</a>
                    </li>
                </ul>
                
                        </li>  
                    </li>   
                </ul>
                <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa fa-shopping-basket'></i> <span>Canastillas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/canastillas/">Registro de canastillas</a>
                    </li>
                    <li>
                    <a href="/admin/canastillas/create">Agregar canastillas</a>
                    </li>
                </ul>
                
                        </li>  
                    </li>   
                </ul>

                 <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa  fa-cart-plus'></i> <span>Tienda</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/tienda/">Ver todos los productos</a>
                    </li>
                    <li>
                    <a href="/admin/tienda/producto/create">Agregar un Producto/Receta</a>
                    </li>
                </ul>
            </li>  
                    </li>


                    
                </ul>

                 <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa   fa-calendar-check-o'></i> <span>Pedidos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/tienda/pedidos">Ver todos los pedidos</a>
                    </li>
                    <li>
                    <a href="/admin/tienda/pedidos/create">Nuevo Pedido</a>
                    </li>
                </ul>
            </li>  
                    </li>                   
                    
                </ul>

                  <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa   fa-calendar-check-o'></i> <span>Producción</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/tienda/pedidos/produccion">Ver todos los pedidos</a>
                    </li>
                   
                </ul>
            </li>  
                    </li>                   
                    
                </ul>

                <ul class="treeview-menu">
                    <li>
                       <li class="treeview">
                <a href="#"><i class='fa   fa-calendar-check-o'></i> <span>Cajas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                    <a href="/admin/cajas/create">Agregar caja</a>
                    </li>
                    <li>
                    <a href="/admin/cajas/">Ver cajas</a>
                    </li>
                    <li>
                    <a href="/admin/cajas/otrosEgresos">Otros Egresos Caja</a>
                    </li>
                   
                </ul>
            </li>  
                    </li>                   
                    
                </ul>

        </li><!-- /.treeview -->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

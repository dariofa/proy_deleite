<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.recetas.create','admin.recetas.edit'],'App\Http\ViewComposers\RecetasComposer');

        View::composer(['admin.clientes.index','admin.recetas.edit'],'App\Http\ViewComposers\ClientesComposer');
        
        View::composer(['admin.tienda.pedidos.create',
            'admin.tienda.pedidos.edit',
            'admin.recetas.edit',
            'admin.tienda.pedidos.show',
            'admin.tienda.pedidos.view'
            ],'App\Http\ViewComposers\PedidosComposer');
        View::composer(['admin.bodega.productos.create','admin.bodega.productos.index','admin.cajas.otrosEgresos.create','admin.cajas.otrosIngresos.create'],'App\Http\ViewComposers\ProductosComposer');
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}

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
        View::composer(['admin.bodega.productos.create','admin.bodega.productos.index','admin.cajas.otrosEgresos.create'],'App\Http\ViewComposers\ProductosComposer');
        View::composer(['admin.bodega.productos.create','admin.bodega.productos.index','admin.cajas.otrosIngresos.create'],'App\Http\ViewComposers\ProductosComposer');
        View::composer(['admin.pedidos.create','admin.pedidos.index'],'App\Http\ViewComposers\PedidosComposer');
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

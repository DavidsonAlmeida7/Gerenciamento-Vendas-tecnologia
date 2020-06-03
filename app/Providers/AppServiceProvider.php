<?php

namespace GerenciamentoVendas\Providers;

use Illuminate\Support\ServiceProvider;
use GerenciamentoVendas\Models\Vendedor;
use GerenciamentoVendas\Observers\VendedorObserver;
use GerenciamentoVendas\Models\Venda;
use GerenciamentoVendas\Observers\VendaObserver;
use GerenciamentoVendas\Models\Produto;
use GerenciamentoVendas\Observers\ProdutoObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Vendedor::observe(VendedorObserver::class);
        Venda::observe(VendaObserver::class);
        Produto::observe(ProdutoObserver::class);
    }
}

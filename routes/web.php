<?php

/*
|--------------------------------------------------------------------------
| Rotas da aplicação
|--------------------------------------------------------------------------
*/

Auth::routes(); //facade que vai criar as rotas de autenticação, estrutura que vai ajudar a chamar metodos de serviços.
Route::get('/', 'HomeController@index')->name('home');

Route::get('/notify', function(){
    $users = GerenciamentoVendas\Models\User::all();
    $message = filter_input(\INPUT_GET, 'm');
    $runIn = now()->addSeconds(30);
    \Notification::send($users, (new GerenciamentoVendas\Notifications\TextNotification($message))->delay($runIn));
    return 'notificados';
})->middleware('auth');

/* teste
Route::group(['middleware' => 'auth', 'can:is-admin'], function(){
    
    Route::group(['prefix' => 'cidades'], function() {
        Route::get('', 'CidadeController@index')->name('cidades');
        Route::get('create', 'CidadeController@create');
        Route::post('store', 'CidadeController@store')->name('cidade.store');
        Route::get('show/{cidade}', 'CidadeController@show');
        Route::get('edit/{cidade}', 'CidadeController@edit');
        Route::put('update/{cidade}', 'CidadeController@update')->name('cidade.update');
        Route::get('destroy/{cidade}', 'CidadeController@destroy')->name('cidade.destroy');
        Route::get('search', 'CidadeController@search');
    });
});
*/

Route::group(['middleware' => 'auth'], function(){
    
    /**************** Rotas de Cidade ****************/
    Route::group(['prefix' => 'cidades'], function() {
        Route::get('', 'CidadeController@index')->name('cidades');
        Route::get('create', 'CidadeController@create');
        Route::post('store', 'CidadeController@store')->name('cidade.store');
        Route::get('show/{cidade}', 'CidadeController@show');
        Route::get('edit/{cidade}', 'CidadeController@edit');
        Route::put('update/{cidade}', 'CidadeController@update')->name('cidade.update');
        Route::get('destroy/{cidade}', 'CidadeController@destroy')->name('cidade.destroy');
        Route::get('search', 'CidadeController@search');
    });

    /**************** Rotas de Cliente ****************/
    Route::group(['prefix' => 'clientes'], function() {
        Route::get('', 'ClienteController@index')->name('clientes');
        Route::get('create', 'ClienteController@create');
        Route::post('store', 'ClienteController@store')->name('cliente.store');
        Route::get('show/{cliente}', 'ClienteController@show');
        Route::get('edit/{cliente}', 'ClienteController@edit');
        Route::put('update/{cliente}', 'ClienteController@update')->name('cliente.update');
        Route::get('destroy/{cliente}', 'ClienteController@destroy')->name('cliente.destroy');
        Route::get('search', 'ClienteController@search');
    });

    /**************** Rotas de Fabricante ****************/
    Route::group(['prefix' => 'fabricantes'], function() {
        Route::get('', 'FabricanteController@index')->name('fabricantes');
        Route::get('create', 'FabricanteController@create');
        Route::post('store', 'FabricanteController@store')->name('fabricante.store');
        Route::get('show/{fabricante}', 'FabricanteController@show');
        Route::get('edit/{fabricante}', 'FabricanteController@edit');
        Route::put('update/{fabricante}', 'FabricanteController@update')->name('fabricante.update');
        Route::get('destroy/{fabricante}', 'FabricanteController@destroy')->name('fabricante.destroy');
        Route::get('search', 'FabricanteController@search');
    });

    /**************** Rotas de Modelo ****************/
    Route::group(['prefix' => 'modelos'], function() {
        Route::get('', 'ModeloController@index')->name('modelos');
        Route::get('create', 'ModeloController@create');
        Route::post('store', 'ModeloController@store')->name('modelo.store');
        Route::get('show/{modelo}', 'ModeloController@show');
        Route::get('edit/{modelo}', 'ModeloController@edit');
        Route::put('update/{modelo}', 'ModeloController@update')->name('modelo.update');
        Route::get('destroy/{modelo}', 'ModeloController@destroy')->name('modelo.destroy');
        Route::get('search', 'ModeloController@search');
    });

    /**************** Rotas de Produto ****************/
    Route::group(['prefix' => 'produtos'], function() {
        Route::get('', 'ProdutoController@index')->name('produtos');
        Route::get('produtos2', 'ProdutoController@index2')->name('produtos2');
        Route::get('create', 'ProdutoController@create');
        Route::post('store', 'ProdutoController@store')->name('produto.store');
        Route::get('show/{produto}', 'ProdutoController@show');
        Route::get('edit/{produto}', 'ProdutoController@edit');
        Route::put('update/{produto}', 'ProdutoController@update')->name('produto.update');
        Route::get('destroy/{produto}', 'ProdutoController@destroy')->name('produto.destroy');
        Route::get('search', 'ProdutoController@search');
    });

    /**************** Rotas de Tipo de Pagamento ****************/
    Route::group(['prefix' => 'tipo_pagamentos'], function() {
        Route::get('', 'TipoPagamentoController@index')->name('tipo_pagamentos');
        Route::get('create', 'TipoPagamentoController@create');
        Route::post('store', 'TipoPagamentoController@store')->name('tipo_pagamento.store');
        Route::get('show/{tipo_pagamento}', 'TipoPagamentoController@show');
        Route::get('edit/{tipo_pagamento}', 'TipoPagamentoController@edit');
        Route::put('update/{tipo_pagamento}', 'TipoPagamentoController@update')->name('tipo_pagamento.update');
        Route::get('destroy/{tipo_pagamento}', 'TipoPagamentoController@destroy')->name('tipo_pagamento.destroy');
        Route::get('search', 'TipoPagamentoController@search');
    });

    /**************** Rotas de Venda ****************/
    Route::group(['prefix' => 'vendas'], function() {
        Route::get('', 'VendaController@index')->name('vendas');
        Route::get('vendas2', 'VendaController@index2')->name('vendas2');
        Route::get('create', 'VendaController@create');
        Route::post('store', 'VendaController@store')->name('venda.store');
        Route::get('show/{venda}', 'VendaController@show');
        Route::get('edit/{venda}', 'VendaController@edit');
        Route::put('update/{venda}', 'VendaController@update')->name('venda.update');
        Route::get('destroy/{venda}', 'VendaController@destroy')->name('venda.destroy');
        Route::get('search', 'VendaController@search');
        Route::get('grafico_produto', 'VendaController@graficoProduto')->name('grafico_produto');
        Route::get('grafico_fabricante', 'VendaController@graficoFabricante')->name('grafico_fabricante');
        Route::get('grafico_vendedor', 'VendaController@graficoVendedor')->name('grafico_vendedor');
        Route::get('pdf', 'VendaController@pdf')->name('venda.pdf'); //teste PDF
    });

    /**************** Rotas de Vendedor ****************/
    Route::group(['prefix' => 'vendedores'], function() {
        Route::get('', 'VendedorController@index')->name('vendedores');
        Route::get('create', 'VendedorController@create');
        Route::post('store', 'VendedorController@store')->name('vendedor.store');
        Route::get('show/{vendedor}', 'VendedorController@show');
        Route::get('edit/{vendedor}', 'VendedorController@edit');
        Route::put('update/{vendedor}', 'VendedorController@update')->name('vendedor.update');
        Route::get('destroy/{vendedor}', 'VendedorController@destroy')->name('vendedor.destroy');
        Route::get('search', 'VendedorController@search');
        Route::post('upload', 'VendedorController@upload');
    });
});



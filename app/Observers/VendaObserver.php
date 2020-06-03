<?php

namespace GerenciamentoVendas\Observers;

use GerenciamentoVendas\Models\Venda;
use GerenciamentoVendas\Models\TipoPagamento;

class VendaObserver
{
    /**
     * Handle the venda "created" event.
     *
     * @param  \GerenciamentoVendas\Venda  $venda
     * @return void
     */
    public function creating(Venda $venda)
    {
        $venda['endereco'] = $venda->cliente_id;
        $venda->data_emissao = date('Y-m-d');
        $venda->frete = Venda::calculaFrete($venda->tipo_pagamento->taxa);
        $venda->valor_total = Venda::valorTotal($venda->frete, $venda->produto->preco);
    }

    /**
     * Handle the venda "updated" event.
     *
     * @param  \GerenciamentoVendas\Venda  $venda
     * @return void
     */
    public function updating(Venda $venda)
    {
        $venda['endereco'] = $venda->cliente_id;
        $venda->data_emissao = date('Y-m-d');
    }
}

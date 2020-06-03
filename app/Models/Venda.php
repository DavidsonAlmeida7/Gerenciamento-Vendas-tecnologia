<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'cliente_id',
        'vendedor_id',
        'produto_id',
        'tipo_pagamento_id',
        'endereco',
        'data_emissao',
        'descricao',
        'frete',
        'valor_total'
    ];

    /**
     * Relacionamento  pertence a uma
     */
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    /**
     * Relacionamento  pertence a uma
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relacionamento  pertence a uma
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    /**
     * Relacionamento  pertence a uma
     */
    public function tipo_pagamento()
    {
        return $this->belongsTo(TipoPagamento::class);
    }

    //metodo para inserir texto no campo de pesquisar cliente_id.
    public static function pesquisarCliente($search)
    {
        return Venda::where('cliente_id', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar vendedor_id.
    public static function pesquisarVendedor($search)
    {
        return Venda::where('vendedor_id', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar produto_id.
    public static function pesquisarProduto($search)
    {
        return Venda::where('produto_id', 'like', '%' . $search . '%')->paginate();
    }

    //Função para formatar data de emissao.
    public function getDataEmissaoFormattedAttribute(){
        return date('d/m/Y', strtotime($this->data_emissao));
    }

    //calcula frete pelo tipo de pagamento.
    public static function calculaFrete($taxa)
    {
        return $taxa * 5;
    }

    //Calcula o valor total da venda.
    public static function valorTotal($frete, $produto_preco)
    {
        return $frete + $produto_preco;
    }
}

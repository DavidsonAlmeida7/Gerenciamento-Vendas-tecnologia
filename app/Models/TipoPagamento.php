<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    protected $table = 'tipo_pagamento';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'tipo',
        'taxa'
    ];

    /**
     * Relacionamento  possui a muitos
     */
    public function venda()
    {
        return $this->hasMany(Venda::class);
    }

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarTipo($search)
    {
        return TipoPagamento::where('tipo', 'like', '%' . $search . '%')->paginate();
    }
}

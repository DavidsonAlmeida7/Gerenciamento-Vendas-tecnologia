<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'Produto';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome',
        'modelo_id',
        'fabricante_id',
        'descricao',
        'quantidade_estoque',
        'preco',
        'codigo_barra',
        'qrcode',
        'foto'
    ];

    /**
     * Relacionamento  pertence a um.
     */
    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    /**
     * Relacionamento  pertence a um.
     */
    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

    /**
     * Relacionamento  pertence a muitos.
     */
    public function venda()
    {
        return $this->belongsToMany(Venda::class);
    }

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarNome($search)
    {
        return Produto::where('nome', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar fabricante_id.
    public static function pesquisarFabricante($search)
    {
        return Produto::where('fabricante_id', 'like', '%' . $search . '%')->paginate();
    }

    /*public static function QuantidadeEstoque($produto_id)
    {
        return Produto::where(['id' => $produto_id])->first();
    }*/

    /*public function setSubtrairEstoque()
    {
        return $this->attributes['quantidade_estoque'] = $this->attributes['quantidade_estoque'] - 1;
    }*/
}

<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome',
        'estado'
    ];

    /**
     * Relacionamento  pertence a muitos
     */
    public function cliente()
    {
        return $this->belongsToMany(Cliente::class);
    }

    /**
     * Relacionamento  pertence a muitos
     */
    public function vendedor()
    {
        return $this->belongsToMany(Vendedor::class);
    }    

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarNome($search)
    {
        return Cidade::where('nome', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar estado.
    public static function pesquisarEstado($search)
    {
        return Cidade::where('estado', 'like', '%' . $search . '%')->paginate();
    }
}

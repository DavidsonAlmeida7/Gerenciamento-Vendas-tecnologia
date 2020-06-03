<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome'
    ];

    /**
     * Relacionamento  possui a muitos
     */
    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarNome($search)
    {
        return Modelo::where('nome', 'like', '%' . $search . '%')->paginate();
    }
}

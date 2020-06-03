<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = 'fabricante';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome',
        'site'
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
        return Fabricante::where('nome', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar site.
    public static function pesquisarSite($search)
    {
        return Fabricante::where('site', 'like', '%' . $search . '%')->paginate();
    }
}

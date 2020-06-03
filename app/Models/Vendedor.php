<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedor';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'cidade_id',
        'telefone',
        'admissao',
        'foto',
        'documento_pessoal'
    ];

    /**
     * Relacionamento  pertence a muitos
     */
    public function venda()
    {
        return $this->belongsToMany(Venda::class);
    }

    /**
     * Relacionamento  pertence a uma
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    /**
     * Método para comparar cidade_id da tabela vendedor com id da tabela cidade.
     */
    public static function comparaCidade($id)
    {
        return Vendedor::where(['cidade_id' => $id])->first();
    }

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarNome($search)
    {
        return Vendedor::where('nome', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar email.
    public static function pesquisarEmail($search)
    {
        return Vendedor::where('email', 'like', '%' . $search . '%')->paginate();
    }

    //Função para formatar o telefone de contato.
    public function getTelefoneFormattedAttribute() {
        $telefone = $this->telefone;
        if (!empty($telefone)) {
            if (strlen($telefone) == 10) {
                $telefone = preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1)$2-$3', $telefone);
            } elseif (strlen($telefone) == 11) {
                $telefone = preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1)$2-$3', $telefone);
            }
        }
        return $telefone;
    }

    //Função para salvar somente com caracteres numericos o telefone de contato.
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = preg_replace('/[^0-9]/', '', $value);
    }

    //Função para formatar data de admissao.
    public function getAdmissaoFormattedAttribute(){
        return date('d/m/Y', strtotime($this->admissao));
    }
}

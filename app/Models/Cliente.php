<?php

namespace GerenciamentoVendas\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    public $timestamps = false; //Por padrão, o Eloquent espera created_at e updated_at existam em suas tabelas.

    protected $fillable = [
        'nome',
        'email',
        'endereco',
        'cidade',
        'telefone',
        'cpf_cnpj',
        'cidade_id'
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
     * Método para comparar cidade_id da tabela cliente com id da tabela cidade.
     */
    public static function comparaCidade($id)
    {
        return Cliente::where(['cidade_id' => $id])->first();
    }

    //metodo para inserir texto no campo de pesquisar nome.
    public static function pesquisarNome($search)
    {
        return Cliente::where('nome', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar email.
    public static function pesquisarEmail($search)
    {
        return Cliente::where('email', 'like', '%' . $search . '%')->paginate();
    }

    //metodo para inserir texto no campo de pesquisar CPF/CNPJ.
    public static function pesquisarCpfCnpj($search)
    {
        return Cliente::where('cpf_cnpj', 'like', '%' . $search . '%')->paginate();
    }

    //Função para formatar o CPF/Cnpj.
    public function getCpfCnpjFormattedAttribute() {
        $cpf_cnpj = $this->cpf_cnpj;
        if (!empty($cpf_cnpj)) {
            if (strlen($cpf_cnpj) == 11) {
                $cpf_cnpj = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf_cnpj);
            } elseif (strlen($cpf_cnpj) == 14) {
                $cpf_cnpj = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cpf_cnpj);
            }
        }
        return $cpf_cnpj;
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

    //Função para salvar somente com caracteres numericos o CPF/CNPJ.
    public function setCpfCnpjAttribute($value) {
        $this->attributes['cpf_cnpj'] = preg_replace('/[^0-9]/', '', $value);
    }

    //Função para salvar somente com caracteres numericos o telefone de contato.
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = preg_replace('/[^0-9]/', '', $value);
    }
}

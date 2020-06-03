<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cliente';

    /**
     * Run the migrations.
     * @table cliente
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('endereco');
            $table->integer('cidade_id')->unsigned();
            $table->string('telefone');
            $table->string('cpf_cnpj');

            $table->foreign('cidade_id')->references('id')->on('cidade');
                //->onDelete('no action')
                //->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}

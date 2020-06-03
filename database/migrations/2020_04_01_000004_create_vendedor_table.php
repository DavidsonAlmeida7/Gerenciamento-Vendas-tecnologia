<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendedorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'vendedor';

    /**
     * Run the migrations.
     * @table vendedor
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
            $table->date('admissao');
            $table->string('foto')->nullable();
            $table->string('documento_pessoal');

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

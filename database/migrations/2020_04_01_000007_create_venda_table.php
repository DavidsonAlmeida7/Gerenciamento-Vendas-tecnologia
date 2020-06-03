<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'venda';

    /**
     * Run the migrations.
     * @table venda
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('vendedor_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->integer('tipo_pagamento_id')->unsigned();
            $table->string('endereco');
            $table->date('data_emissao');
            $table->text('descricao');
            $table->decimal('frete', 10, 2);
            $table->decimal('valor_total', 10, 2);

            $table->foreign('cliente_id')->references('id')->on('cliente');
                //->onDelete('no action')
                //->onUpdate('no action');

            $table->foreign('vendedor_id')->references('id')->on('vendedor');
                //->onDelete('no action')
                //->onUpdate('no action');

            $table->foreign('produto_id', 'fk_venda_produto1_idx')->references('id')->on('produto');
                //->onDelete('no action')
                //->onUpdate('no action');

            $table->foreign('tipo_pagamento_id')->references('id')->on('tipo_pagamento');
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

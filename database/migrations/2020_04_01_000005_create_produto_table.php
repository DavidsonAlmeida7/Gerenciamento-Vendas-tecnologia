<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'produto';

    /**
     * Run the migrations.
     * @table produto
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->integer('modelo_id')->unsigned();
            $table->integer('fabricante_id')->unsigned();
            $table->text('descricao');
            $table->integer('quantidade_estoque');
            $table->decimal('preco', 10, 2);
            $table->string('codigo_barra')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('foto')->nullable();

            $table->foreign('fabricante_id')->references('id')->on('fabricante');
                //->onDelete('no action')
                //->onUpdate('no action');

            $table->foreign('modelo_id')->references('id')->on('modelo');
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

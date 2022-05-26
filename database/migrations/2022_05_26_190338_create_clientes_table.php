<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpf', 14)->nullable()->unique();
            $table->string('nome');
            $table->string('nascimento', 10)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero', 30)->nullable();
            $table->string('bairro', 150)->nullable();
            $table->string('complemento')->nullable();
            $table->string('cidade', 150)->nullable();
            $table->string('uf', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

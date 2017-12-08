<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('resales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('inscricao_estadual');
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('tipo_loja');
            $table->string('soube');
            $table->string('cep');
            $table->string('endereco');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
            $table->string('nome_contato');
            $table->string('email');
            $table->string('site')->nullable();
            $table->string('telefone');
            $table->string('celular');
            $table->timestamps();
            $table->softDeletes();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        //Schema::dropIfExists('resales');
    }
}

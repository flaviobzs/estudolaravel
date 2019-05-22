<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaTamanhoNoProdutos extends Migration
{
    //orderm da migraçao deve existir
    //questoes das chaves estrangeira

    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            //     $table->string('tamanho', 100)->default('nao tem tamanho);
            //     
          //   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

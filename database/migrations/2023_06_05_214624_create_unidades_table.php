<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //Sigla da unidade, por exemplo cm, kg, mm
            $table->string('descricao', 30);
            $table->timestamps();
        });

         //Adicionar o relacionamento na tabela produtos
         Schema::table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
         });
 
         //Adicionar o relacionamento na tabela produto_detalhes
         Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');

         });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Remover o relacionamento na tabela produtos
        Schema::table('produtos', function (Blueprint $table){
            //Remover a FK
            $table->dropForeign('produtos_unidade_id_foreign'); //[table]_[coluna]_foreign
            //Remover a coluna
            $table->dropColumn('unidade_id');
         });

        //Remover o relacionamento na tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table){
            //Remover a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //Remover a coluna
            $table->dropColumn('unidade_id');
         });

        Schema::dropIfExists('unidades');
    }
};
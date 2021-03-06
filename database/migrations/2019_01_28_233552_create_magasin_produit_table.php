<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagasinProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magasin_produit', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('magasin_id')->unsigned();
            $table->foreign('magasin_id')->references('id')->on('magasins');
           
            $table->integer('produit_id')->unsigned();
            $table->foreign('produit_id')->references('id')->on('produits');
           
            $table->string('quantite');
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
        Schema::dropIfExists('magasin_produit');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseEchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_echanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produitEchangeID');
            $table->string('quantite');
            $table->text('description');
            $table->boolean('confirm')->default(0);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
           
            $table->integer('offre_id')->unsigned();
            $table->foreign('offre_id')->references('id')->on('offres');
           
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
        Schema::dropIfExists('response_echanges');
    }
}

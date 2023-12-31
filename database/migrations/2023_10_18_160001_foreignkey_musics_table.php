<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('musics', function (Blueprint $table) {

         $table->unsignedBigInteger('type_id'); // Clé étrangère
            $table->foreign('type_id')->references('id')->on('types');
        });
   
   
   
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
};

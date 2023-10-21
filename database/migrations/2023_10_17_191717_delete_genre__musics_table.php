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
            // $table->dropColumn('image');
            // $table->dropColumn('lyrics');
            // $table->dropColumn('size');
            // $table->dropColumn('duration');
            // $table->dropColumn('year');
            $table->dropColumn('genre');
            
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

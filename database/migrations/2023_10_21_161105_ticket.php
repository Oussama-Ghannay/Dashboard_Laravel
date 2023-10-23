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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('prix');
            $table->string('date_achat');
            $table->foreignId('event_id')
                ->constrained()
                ->onUpdate('restrict')
                ->onDelete('restrict');   
            $table->foreign('event_id')->references('id')->on('event');   
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');         
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
        //
    }
};

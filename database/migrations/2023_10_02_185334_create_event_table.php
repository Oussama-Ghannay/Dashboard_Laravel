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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            /*Nom : Le nom de l'événement.
Description : Une description détaillée de l'événement.
Date et heure : La date et l'heure de début de l'événement.
Lieu : Le lieu où se déroule l'événement (peut être lié à une entité "Lieu" distincte).
Artiste(s) : Les artistes, groupes ou participants associés à l'événement (peut être lié à une entité "Artiste").
Prix du billet : Le prix du billet d'entrée à l'événement.
Stock de billets : Le nombre de billets disponibles pour l'événement.
Catégorie : La catégorie à laquelle l'événement appartient (par exemple, musique, art visuel, danse).
Image de l'événement : Une image ou une affiche représentant l'événement.*/
            $table->string('nom');
            $table->string('description');
            $table->string('date');
            $table->string('lieu');
            $table->string('artiste');
            $table->string('categorie');
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
        Schema::dropIfExists('event');
    }
};

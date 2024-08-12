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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('CodeEtudiant')->Unique();
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('CIN')->Unique();
            $table->integer('NbPhone');
            $table->date('DateNaissance');
            $table->string('Password');

            $table->string('Feliere');
            $table->string('Ville');
            $table->integer('AnneeBac');
           

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
        Schema::dropIfExists('students');
    }
};

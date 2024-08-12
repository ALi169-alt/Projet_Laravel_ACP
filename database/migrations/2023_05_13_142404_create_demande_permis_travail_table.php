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
        Schema::create('demande_permis_travail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->string('type_permis');
            $table->string('description');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();
        
            $table->foreign('employee_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_permis_travail');
    }
};

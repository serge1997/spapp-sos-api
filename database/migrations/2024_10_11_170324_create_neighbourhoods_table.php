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
        Schema::create('neighbourhoods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_risked')->default(false);
            $table->integer('municipality_id')->unsigned();
            $table->bigInteger('population')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->enum('origin', ["Agent spapp", "Delivery spapp", "Owner spapp"]);
            $table->foreign('municipality_id')->references('id')
                ->on('municipalities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neighbourhoods');
    }
};

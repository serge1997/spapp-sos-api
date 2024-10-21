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
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('municipality_id')->unsigned()->nullable();
            $table->integer('neighbourhood_id')->unsigned();
            $table->integer('sector_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');
            $table->foreign('municipality_id')->references('id')
                ->on('municipalities')->onDelete('cascade');
            $table->foreign('neighbourhood_id')->references('id')
                ->on('neighbourhoods')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')
                ->on('sectors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

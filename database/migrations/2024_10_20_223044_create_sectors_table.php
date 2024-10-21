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
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')
                ->on('municipalities')->onDelete('cascade');
            $table->integer('neighbourhood_id')->unsigned();
            $table->foreign('neighbourhood_id')->references('id')
                ->on('neighbourhoods')->onDelete('cascade');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->boolean('is_risked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secors');
    }
};

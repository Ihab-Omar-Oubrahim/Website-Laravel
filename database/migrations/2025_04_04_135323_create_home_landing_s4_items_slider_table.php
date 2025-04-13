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
        Schema::create('home_landing_s4_items_slider', function (Blueprint $table) {
            $table->id();
            $table->string('Slider_title');
            $table->text('Slider_dec');
            $table->string('slider_img');
            $table->text('slider_paragraph');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_landing_s4_items_slider');
    }
};

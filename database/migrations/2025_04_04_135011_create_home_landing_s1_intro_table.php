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
        Schema::create('home_landing_s1_intro', function (Blueprint $table) {
            $table->id();
            $table->string('Intro_title');
            $table->text('Intro_paragraph_1');
            $table->text('Intro_paragraph_2');
            $table->string('Intro_button_text_1');
            $table->string('intro_image_1');
            $table->string('intro_image_2');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_landing_s1_intro');
    }
};

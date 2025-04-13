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
        Schema::create('home_landing_s2_info', function (Blueprint $table) {
            $table->id();
            $table->string('Mega_Title');
            $table->string('mini_title_left_1');
            $table->string('mini_title_middle_2');
            $table->string('mini_title_right_3');
            $table->text('mini_desc_left_1');
            $table->text('mini_desc_middle_2');
            $table->text('mini_desc_right_3');
            $table->string('img_left_1');
            $table->string('img_middle_2');
            $table->string('img_right_3');
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_landing_s2_info');
    }
};

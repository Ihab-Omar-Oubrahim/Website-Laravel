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
        Schema::create('web_page', function (Blueprint $table) {
            $table->string('id_page')->primary();
            $table->string('page_name');
            $table->string('page_description')->nullable();
            $table->boolean('page_access')->default(true); // true = all users can see page and false only admins can see page
            $table->boolean('status')->default(true); // true = the page should be visible, false = 404 page not found
            $table->boolean('maintenance')->default(false); // if maintenance is true then we show maintenance page
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_page');
    }
};

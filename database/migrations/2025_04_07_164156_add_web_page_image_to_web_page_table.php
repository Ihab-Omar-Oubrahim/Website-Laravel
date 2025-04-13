<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('web_page', function (Blueprint $table) {
            $table->binary('web_page_image')->after('page_description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('web_page', function (Blueprint $table) {
            $table->dropColumn('web_page_image');
        });
    }
};

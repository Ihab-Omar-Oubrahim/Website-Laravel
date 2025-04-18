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
        Schema::table('user_contact', function (Blueprint $table) {
            $table->binary('contact_file')->nullable()->after('contact_message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_contact', function (Blueprint $table) {
            $table->dropColumn('contact_file');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_contact', function (Blueprint $table) {
            DB::statement('ALTER TABLE user_contact MODIFY contact_file MEDIUMBLOB NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_contact', function (Blueprint $table) {
            DB::statement('ALTER TABLE user_contact MODIFY contact_file BLOB NULL');
        });
    }
};

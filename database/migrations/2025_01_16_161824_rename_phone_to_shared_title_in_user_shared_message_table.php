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
        Schema::table('user_shared_message', function (Blueprint $table) {
            $table->renameColumn('phone', 'shared_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_shared_message', function (Blueprint $table) {
            $table->renameColumn('shared_title', 'phone');
        });
    }
};

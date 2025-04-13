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
        Schema::table('home_landing_s2_info', function (Blueprint $table) {
            $table->string('id_page')->nullable(false)->after('id');

            $table->foreign('id_page')
                ->references('id_page')
                ->on('web_page')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_landing_s2_info', function (Blueprint $table) {
            $table->dropForeign(['id_page']);
            $table->dropColumn('id_page');
        });
    }
};

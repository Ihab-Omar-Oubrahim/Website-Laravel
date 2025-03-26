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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('user_id'); // Who reported
            $table->bigInteger('reported_comment_id')->unsigned(); // Use bigInteger to match the referenced column
            $table->string('report_title'); // Title of the report
            $table->text('report_reason'); // Detailed reason for the report
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('reported_comment_id')->references('id')->on('user_comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

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
        Schema::create('workflow', function (Blueprint $table) {
            $table->id();
            $table->string('step_name');
            $table->string('step_user');
            $table->string('is_completed');
            $table->string('date_completed');
            $table->string('approved_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow');
    }
};

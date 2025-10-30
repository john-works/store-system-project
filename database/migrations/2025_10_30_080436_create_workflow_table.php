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
             $table->unsignedBigInteger('workflow_step_id');
    $table->foreign('workflow_step_id')->references('id')->on('workflow_step')->onDelete('cascade');
            // $table->foreignId('workflow_step_id')->constrained('workflow_steps')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('is_completed')->default(false);
            $table->dateTime('date_completed')->nullable();
            $table->enum('approved_status', ['pending', 'approved', 'rejected'])->default('pending');
           
            $table->timestamps();
            //  $table->foreignId('workflow_step_id')->constrained('workflow_steps')->onDelete('cascade');
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

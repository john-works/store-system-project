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
        Schema::create('moverments', function (Blueprint $table) {
            $table->id();
            $table->string('request_date');
            $table->string('request_by');
            $table->string('request_summary');
          $table->unsignedBigInteger('item_id');
          $table->unsignedBigInteger('user_id')->nullable();
            // $table->string('asset_tag');
            // $table->string('serial_number');
            $table->string('from_department');
            $table->string('from_user');
            $table->string('to_department');
             $table->string('to_user');

             $table->string('status') ->nullable();
             $table->string('current_step') ->nullable();
            $table->string('current_step_user') ->nullable();
            $table->string('current_step_start') ->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moverments');
    }
};

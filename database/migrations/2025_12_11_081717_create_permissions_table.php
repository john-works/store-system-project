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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('resource'); // e.g., 'suppliers', 'invoices'
            $table->string('action'); // e.g., 'create', 'index', 'edit', 'delete', 'show'
            $table->boolean('allowed')->default(true);
            $table->timestamps();

            $table->unique(['user_id', 'resource', 'action']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};

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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('procurement_type');
            $table->string('amount_cost');
            $table->string('signing_date');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('procument_subject');
            $table->string('termination_clauses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};

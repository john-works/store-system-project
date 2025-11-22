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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // $table->string('supplier_name');
            $table->string('received_date');
            $table->string('invoice_number');
            $table->string('invoice_date');
             $table->string('invoice_description');
            $table->string('received_amount');
            $table->string('invoice_currency');
            // $table->string('invoice_date');
             $table->unsignedBigInteger('supplier_id');
$table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

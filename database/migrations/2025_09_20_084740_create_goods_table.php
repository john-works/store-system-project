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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            //  $table->string('supplier_name');
            $table->string('request_date');
            $table->string('request_by');
            $table->string('verified_by');
            $table->string('invoice_number');
            $table->string('item__description');
            $table->string('quality');
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
        Schema::dropIfExists('goods');
    }
};

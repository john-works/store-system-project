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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('supplier_id');
            $table->string('item_name');
            $table->string('unit_of_measure'); 
            $table->string('serier_number');
             $table->string('asset_tag');
            $table->string('date_delivered');
            $table->string('expiry_date');
            $table->string('qty');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

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
        Schema::table('workflows', function (Blueprint $table) {
            $table->unsignedBigInteger('workflowable_id')->after('id');
            $table->string('workflowable_type')->after('workflowable_id');
            $table->index(['workflowable_id', 'workflowable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workflows', function (Blueprint $table) {
            $table->dropIndex(['workflowable_id', 'workflowable_type']);
            $table->dropColumn(['workflowable_id', 'workflowable_type']);
        });
    }
};

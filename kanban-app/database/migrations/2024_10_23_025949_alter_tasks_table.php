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
        // Schema::table('tasks', function (Blueprint $table) {
        //      $table->integer('order_column')->default(0)->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('tasks', function (Blueprint $table) {
        //     $table->integer('order_column')->nullable(false)->default(null)->change();
        // });
    }
};

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
        Schema::table('caretakers', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('contact');
            $table->foreign('role_id')->references('id')->on('roles')            
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('caretakers', function (Blueprint $table) {
                // 1. Drop foreign key constraints
                $table->dropForeign(['role_id']);

                // 2. Drop the column
                $table->dropColumn('role_id');
        });
    }
};

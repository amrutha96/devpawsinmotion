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
        Schema::table('appointments', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['caretaker_id']);

            // Drop the column
            $table->dropColumn('caretaker_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('caretaker_id')->nullable();
            $table->foreign('caretaker_id')->references('id')->on('caretakers')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }
};

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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime')->nullable();
            $table->string('pickup_address');
            $table->string('postcode');
            $table->enum('status', ['created', 'assigned', 'completed']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')            
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->unsignedBigInteger('dog_id')->nullable();
            $table->foreign('dog_id')->references('id')->on('dogs')            
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->unsignedBigInteger('caretaker_id')->nullable();
            $table->foreign('caretaker_id')->references('id')->on('caretakers')            
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
          // 1. Drop foreign key constraints
          $table->dropForeign(['user_id']);

          // 2. Drop the column
          $table->dropColumn('user_id');

            // 1. Drop foreign key constraints
          $table->dropForeign(['dog_id']);

            // 2. Drop the column
          $table->dropColumn('dog_id');

          // 1. Drop foreign key constraints
          $table->dropForeign(['caretaker_id']);

          // 2. Drop the column
          $table->dropColumn('caretaker_id');
    }
};

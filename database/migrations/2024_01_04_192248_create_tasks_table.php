<?php

use Illuminate\{Database\Migrations\Migration, Database\Schema\Blueprint, Support\Facades\Schema};

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'tasks', callback: static function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->text(column: 'description');
            $table->bigInteger(column: 'assigned_by_id', unsigned: true)->nullable();
            $table->foreign(columns: 'assigned_by_id')->references('id')->on('admins')->onDelete('set null');
            $table->bigInteger(column: 'assigned_to_id', unsigned: true)->nullable();
            $table->foreign(columns: 'assigned_to_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'tasks');
    }
};

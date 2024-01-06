<?php
declare(strict_types=1);

use Illuminate\{Database\Migrations\Migration, Database\Schema\Blueprint, Support\Facades\Schema};

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistics', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id');
            $table->integer(column: 'task_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};

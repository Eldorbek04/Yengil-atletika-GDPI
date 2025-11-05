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
        Schema::create('yadro_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family_name');
            $table->string('middle_name')->nullable();
            $table->string('orientation')->nullable();
            $table->string('group');
            $table->decimal('result', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yadro_models');
    }
};

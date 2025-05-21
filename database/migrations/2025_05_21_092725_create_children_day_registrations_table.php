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
        Schema::create('children_day_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->string('department');
            $table->integer('children_count');
            $table->text('children_ages');
            $table->string('phone')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children_day_registrations');
    }
};

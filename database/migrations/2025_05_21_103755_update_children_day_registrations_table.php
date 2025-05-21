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
        Schema::table('children_day_registrations', function (Blueprint $table) {
            // Check if columns exist before trying to drop them
            if (Schema::hasColumns('children_day_registrations', ['child_name', 'child_age', 'email'])) {
                $table->dropColumn(['child_name', 'child_age', 'email']);
            }

            // We don't need to add children_count and children_ages as they already exist
            // in the original migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('children_day_registrations', function (Blueprint $table) {
            // We don't need to drop children_count and children_ages as they were not added
            // in this migration but in the original one

            // Recréer les colonnes supprimées
            $table->string('child_name')->after('parent_name');
            $table->integer('child_age')->after('child_name');
            $table->string('email')->after('parent_name');
        });
    }
};

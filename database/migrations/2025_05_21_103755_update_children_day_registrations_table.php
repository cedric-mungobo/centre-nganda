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
            // Supprimer les colonnes obsolètes
            $table->dropColumn(['child_name', 'child_age', 'email']);

            // Ajouter les nouvelles colonnes
            $table->integer('children_count')->after('department');
            $table->text('children_ages')->after('children_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('children_day_registrations', function (Blueprint $table) {
            // Supprimer les colonnes ajoutées
            $table->dropColumn(['children_count', 'children_ages']);

            // Recréer les colonnes supprimées
            $table->string('child_name')->after('parent_name');
            $table->integer('child_age')->after('child_name');
            $table->string('email')->after('parent_name');
        });
    }
};

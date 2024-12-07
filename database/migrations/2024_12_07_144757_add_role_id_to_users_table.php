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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable()->after('id'); // Ajoute la colonne role_id après id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); // Définit la clé étrangère
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['role_id']); // Supprime la contrainte de clé étrangère
            $table->dropColumn('role_id'); // Supprime la colonne role_id
        });
    }
};

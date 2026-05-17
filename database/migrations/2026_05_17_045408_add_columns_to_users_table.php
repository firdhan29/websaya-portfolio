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
            $table->text('summary')->nullable();
            $table->string('phone_wa')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('location_province')->nullable();
            $table->string('location_city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['summary', 'phone_wa', 'linkedin_url', 'github_url', 'location_province', 'location_city']);
        });
    }
};

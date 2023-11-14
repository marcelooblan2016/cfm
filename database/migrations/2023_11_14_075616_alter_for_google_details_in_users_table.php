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
            // update column
            $table->string('password')->nullable()->change();
            // new column
            $table->string('google_id')->after('remember_token')->nullable();
            $table->text('google_access_token')->after('google_id')->nullable();
            $table->text('google_refresh_token')->after('google_access_token')->nullable();
            $table->string('google_expires_in')->after('google_refresh_token')->nullable();
            $table->json('properties')->after('google_expires_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // revert changes
            $table->string('password')->change();
            // drop columns
            $table->dropColumn([
                'google_id', 
                'google_access_token', 
                'google_refresh_token',
                'google_expires_in',
                'properties'
            ]);
        });
    }
};

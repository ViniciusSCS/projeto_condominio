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
        Schema::table('apartamentos', function (Blueprint $table) {
            $table->foreignUuid('user_morador')->unique()->nullable();
            $table->foreignUuid('user_proprietario')->nullable();
            $table->foreign('user_morador')->references('uuid')->on('users');
            $table->foreign('user_proprietario')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apartamentos', function (Blueprint $table) {
            $table->dropColumn('user_morador');
            $table->dropColumn('user_proprietario');
        });
    }
};

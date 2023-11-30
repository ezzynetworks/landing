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
        $table->string('user_type');
        $table->string('phone_number')->nullable();
        $table->longText('terms');
        $table->string('password')->nullable()->change();
        $table->string('avatar')->nullable();
        $table->string('external_id')->nullable();
        $table->string('external_auth')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('user_type');
        $table->dropColumn('phone_number')->nullable();
        $table->dropColumn('terms');
        $table->string('password')->change();
        $table->dropColumn('avatar')->nullable();
        $table->dropColumn('external_id')->nullable();
        $table->dropColumn('external_auth')->nullable();
      });
    }
};

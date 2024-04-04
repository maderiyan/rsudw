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
          $table->integer('id_ruangan')->unsigned()->nullable();
          $table->foreign('id_ruangan')->references('id')->on('ruangan')->onDelete('cascade')->onUpdate('cascade');
          $table->enum('is_teknisi', ['1', '0'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('id_ruangan');
          $table->dropColumn('is_teknisi');
        });
    }
};

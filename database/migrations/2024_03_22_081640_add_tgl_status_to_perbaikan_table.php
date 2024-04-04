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
        Schema::table('perbaikan', function (Blueprint $table) {
          $table->integer('user_pemohon')->unsigned()->nullable();
          $table->integer('user_assign')->unsigned()->nullable();
          $table->date('tgl_pengajuan')->nullable();
          $table->date('tgl_selesai')->nullable();
          $table->date('tgl_estimasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perbaikan', function (Blueprint $table) {
          $table->dropColumn('user_pemoho');
          $table->dropColumn('user_assign');
          $table->dropColumn('tgl_pengajuan');
          $table->dropColumn('tgl_selesai');
          $table->dropColumn('tgl_estimasi');
        });
    }
};

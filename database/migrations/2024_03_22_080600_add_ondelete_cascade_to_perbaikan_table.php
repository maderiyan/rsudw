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
        Schema::table('eviden', function (Blueprint $table) {
          $table->dropForeign('eviden_perbaikan_id_foreign');
          $table->foreign('perbaikan_id')->references('id')->on('perbaikan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eviden', function (Blueprint $table) {
          $table->dropForeign('eviden_perbaikan_id_foreign');
        });
    }
};

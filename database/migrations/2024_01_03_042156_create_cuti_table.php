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
    Schema::create('cuti', function (Blueprint $table) {
      $table->id();
      $table->string('nomor_induk', 7);
      $table->foreign('nomor_induk', 'fk_no_induk_to_karyawan')->references('nomor_induk')->on('karyawan')->cascadeOnUpdate()->cascadeOnDelete();
      $table->date('tgl_cuti');
      $table->integer('lama_cuti');
      $table->string('keterangan')->nullable();

      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('cuti');
  }
};

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
    Schema::create('karyawan', function (Blueprint $table) {
      $table->id();
      $table->string('nomor_induk', 7)->unique();
      $table->string('nama');
      $table->string('alamat')->nullable();
      $table->date('tgl_lahir')->nullable();
      $table->date('tgl_bergabung')->nullable();

      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('karyawan');
  }
};

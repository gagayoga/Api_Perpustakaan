<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_buku');
            $table->string('kode_peminjaman');
            $table->date('tanggal_pinjam');
            $table->date('deadline');
            $table->date('tanggal_kembali');
            $table->enum('status', ['Disetujui', 'Ditolak', 'Dipinjam', 'Selesai', 'Proses'])->default(null);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_buku')->references('id')->on('bukus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
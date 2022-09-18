<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->UnsignedBigInteger('bidang_id');
            $table->text('deskripsi');
            $table->integer('jumlah_diajukan');
            $table->integer('jumlah_approval')->nullable();
            $table->integer('status');
            $table->tinyInteger('verifikator_approved')->default(0);
            $table->text('alasan_verifikator');
            $table->tinyInteger('ketuaharian_approved')->default(0);
            $table->text('alasan_ketuaharian')->nullable();
            $table->integer('termin');
            $table->timestamps();

            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
};

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
        Schema::create('spjs', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->UnsignedBigInteger('bidang_id');
            $table->text('deskripsi');
            $table->integer('nominal_spj');
            $table->integer('nominal_verifikasi');
            $table->string('status');
            $table->tinyInteger('verifikator_approved');
            $table->text('alasan_verifikator');
            $table->tinyInteger('ketuaharian_approved');
            $table->text('alasan_ketuaharian');
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
        Schema::dropIfExists('spjs');
    }
};

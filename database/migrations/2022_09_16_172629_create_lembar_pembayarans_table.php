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
        Schema::create('lembar_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('npwp_penerima');
            $table->longText('alamat_penerima');
            $table->string('rekening_penerima');
            $table->string('bank');
            $table->text('keterangan');
            $table->BigInteger('nominal');
            $table->date('date_of_transaction');
            $table->string('filename');
            $table->string('type');
            $table->string('size');
            $table->unsignedBigInteger('proposal_id');
            $table->string('folder_path');
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lembar_pembayarans');
    }
};

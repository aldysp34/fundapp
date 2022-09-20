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
        Schema::create('excel_data', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->string('volume_1')->nullable();
            $table->string('satuan_1')->nullable();
            $table->string('volume_2')->nullable();
            $table->string('satuan_2')->nullable();
            $table->string('volume_3')->nullable();
            $table->string('satuan_3')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('jumlah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excel_data');
    }
};

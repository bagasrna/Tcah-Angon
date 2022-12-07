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
        Schema::create('kandangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peternak_id');
            $table->string('name');
            $table->string('foto');
            $table->double('bagi_hasil');
            $table->string('potensi_roi');
            $table->integer('unit_tersedia');
            $table->boolean('status');
            $table->double('harga');
            $table->double('harga_kg');
            $table->integer('paket');
            $table->string('proposal');
            $table->double('dibutuhkan');
            $table->double('terkumpul')->default(0);
            $table->integer('durasi');
            $table->double('berat_awal');
            $table->double('estimasi');
            $table->double('berat_akhir');
            $table->double('persentase');
            $table->double('berat');
            $table->string('kesehatan');
            $table->string('pakan');
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
        Schema::dropIfExists('kandangs');
    }
};

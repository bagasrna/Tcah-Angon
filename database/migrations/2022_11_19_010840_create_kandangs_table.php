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
            $table->integer('bagi_hasil');
            $table->string('potensi_roi');
            $table->integer('unit_tersedia');
            $table->boolean('status');
            $table->integer('harga');
            $table->integer('paket');
            $table->string('proposal');
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

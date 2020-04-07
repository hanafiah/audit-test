<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilih', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('no_kp');
            $table->string('no_personel')->nullable();
            $table->string('jenis_kp')->nullable();
            $table->string('nama');
            $table->string('jantina');
            $table->string('keturunan');
            $table->string('agama');
            $table->string('alamat1');
            $table->string('alamat2');
            $table->string('alamat3')->nullable();
            $table->string('poskod');
            $table->string('bandar');
            $table->string('kodNegeri');

            $table->softDeletes();
            $table->timestamps();

            $table->primary('id');
            $table->index('no_kp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilih');
    }
}

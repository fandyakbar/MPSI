<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->string('password');
            $table->integer('nim');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('konsentrasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kons')->nullable();
            $table->string('email');
            $table->string('nama');
            $table->string('nip');
            $table->string('password');
            $table->timestamps();

            $table->foreign('id_kons')->references('id')->on('konsentrasi')->onDelete('set null');
        });

        Schema::create('rancangan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mahasiswa')->nullable();
            $table->string('judul')->nullable();
            $table->integer('status');
            $table->string('file_surat')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('catatan_dosen')->nullable();
            $table->timestamps();

            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswa')->onDelete('set null');
        });

        Schema::create('detail_dosbing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rancangan')->nullable();
            $table->unsignedBigInteger('id_dosen')->nullable();
            $table->timestamps();

            $table->foreign('id_rancangan')->references('id')->on('rancangan')->onDelete('set null');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all');
    }
}

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
        Schema::create('tb_tiket', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nama'); // Kolom untuk nama tiket
            $table->date('tanggal'); // Kolom untuk tanggal tiket
            $table->string('jam'); // Kolom untuk jam tiket
            $table->integer('jumlah'); // Kolom untuk jumlah tiket
            $table->string('tujuan');
            $table->timestamps(); // Kolom created_at dan updated_at
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_tiket');
    }
};

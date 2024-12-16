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
        Schema::table('tb_tiket', function (Blueprint $table) {
            $table->string('kapal')->nullable(); // Menambahkan kolom kapal
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_tiket', function (Blueprint $table) {
            $table->dropColumn('kapal'); // Menghapus kolom kapal jika migration dibatalkan
        });
    }
};

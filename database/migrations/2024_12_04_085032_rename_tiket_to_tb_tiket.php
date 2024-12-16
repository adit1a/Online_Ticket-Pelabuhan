<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTiketToTbTiket extends Migration
{
    public function up()
    {
        Schema::rename('tiket', 'tb_tiket');
    }

    public function down()
    {
        Schema::rename('tb_tiket', 'tiket');
    }
}

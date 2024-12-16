<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNamaNullableInTbTiket extends Migration
{
    public function up()
    {
        Schema::table('tb_tiket', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('tb_tiket', function (Blueprint $table) {
            $table->string('nama')->nullable(false)->change(); // Kembalikan ke non-nullable jika perlu
        });
    }
}
?>
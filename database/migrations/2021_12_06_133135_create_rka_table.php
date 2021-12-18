<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rka', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['Pengembangan Kompetensi Lulusan', 'Pengembangan Standar Isi', 'Pengembangan Standar Kelulusan', 'Pengembangan Pendidik dan Tenaga Kependidikan', 'Pengembangan Saran dan Prasarana Sekolah', 'Pengembangan Standar Pengelolaan', 'Pengembangan Standar Pembiayaan', 'Pemgembagan dan Implementasi SIstem Penilaian']);
            $table->string('jenis_barang');
            $table->string('kode_rekening');
            $table->enum('jenis_pajak', ['PPN 10%', 'PPH23 4%', 'Pajak Daerah 10%', 'PPH21 5%']);
            $table->boolean('is_upload_nota')->default(0);
            $table->boolean('is_approve_admin_zona')->default(0);
            $table->boolean('is_approve_admin')->default(0);
            $table->boolean('is_approve_super_admin')->default(0);
            $table->string('id_user', 32)->references('id')->on('users');
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
        Schema::dropIfExists('rka');
    }
}

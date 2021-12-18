<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_belanja', ['Barang', 'Jasa', 'Modal']);
            $table->decimal('jumlah_harga', 12, 2);
            $table->decimal('total', 12, 2)->nullable();
            $table->string('file_nota');
            $table->foreignId('id_rka')->constrained('rka');

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
        Schema::dropIfExists('nota');
    }
}

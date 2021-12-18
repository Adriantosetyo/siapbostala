<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spj', function (Blueprint $table) {
            $table->id();
            $table->string('file_pra_rka');
            $table->string('file_rka');
            $table->string('file_bku');
            $table->string('file_lra_bos');
            $table->string('file_register');
            $table->string('file_berita');
            $table->string('file_k7');
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
        Schema::dropIfExists('spj');
    }
}

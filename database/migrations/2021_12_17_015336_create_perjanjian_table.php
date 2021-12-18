<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerjanjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjian', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah', 12, 2);
            $table->boolean('is_approve_admin_zona')->default(0);
            $table->boolean('is_approve_admin')->default(0);
            $table->boolean('is_approve_super_admin')->default(0);
            $table->string('file_perjanjian');
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
        Schema::dropIfExists('perjanjian');
    }
}

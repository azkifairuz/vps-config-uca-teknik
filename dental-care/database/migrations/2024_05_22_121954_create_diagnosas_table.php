<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diagnosa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_passien');
            $table->integer('id_penyakit');
            $table->integer('id_solusi');
            $table->integer('id_gejala');
            $table->string('bobot_user');

            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosa');
    }
};

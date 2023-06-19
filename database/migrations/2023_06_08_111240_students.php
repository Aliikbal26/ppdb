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
        //
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('user_id');
            $table->foreign('email')->references('email')->on('users');
            $table->string('no_pendaftaran', 12)->unique();
            $table->string('nama');
            $table->string('gender');
            $table->string('email');
            $table->char('nim', 8)->unique();
            $table->string('jurusan');
            $table->string('foto');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('students');
    }
};

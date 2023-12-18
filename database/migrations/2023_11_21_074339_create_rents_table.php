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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('vehicle_id');
            
            // Personal identity
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('telp_num');
            $table->string('sec_contact');
            $table->string('username_instagram');
            $table->string('pekerjaan');
            $table->string('universitas');
            $table->integer('nim');
            $table->string('jurusan');
            $table->string('id_line')->nullable();
            $table->integer('angkatan');
            $table->string('kelas');


            // Rent details
            $table->datetime('start_date', 0);
            $table->datetime('end_date', 0);
            $table->string('rute_tujuan');
            $table->string('rute_tujuan_ket');
            $table->string('ktp');
            $table->string('sim');
            $table->string('ktm')->nullable();

            $table->string('status')->default('Booked');
            $table->string('payment_status')->default('Unpaid');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};

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
            $table->foreignId('status_id')->default(1);
            
            // Personal identity
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('telp_num');
            $table->string('sec_contact');
            $table->string('username_instagram');
            $table->string('pekerjaan');
            $table->string('universitas');
            $table->string('nim');
            $table->string('jurusan');
            $table->string('id_line')->nullable();
            $table->string('angkatan');
            $table->string('kelas');


            // Rent details
            $table->datetime('start_date', 0);
            $table->datetime('end_date', 0);
            $table->string('rute_tujuan');
            $table->string('rute_tujuan_ket');
            $table->string('ktp');
            $table->string('sim');
            $table->string('ktm')->nullable();

            // Terms and Condiiton
            $table->string('tnc')->default('disagree');

            $table->integer('total_price')->nullable();
            $table->string('snap_token')->nullable();
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

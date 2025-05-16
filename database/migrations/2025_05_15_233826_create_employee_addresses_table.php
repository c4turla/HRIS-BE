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
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary key auto-increment
            $table->uuid('employee_id'); // Relasi ke tabel employees (UUID)
            $table->string('address_type'); // Misalnya: Permanent, Temporary, Emergency Contact
            $table->text('street_address')->nullable(); // Alamat lengkap jalan
            $table->string('rt')->nullable(); // RT
            $table->string('rw')->nullable(); // RW
            $table->string('village')->nullable(); // Desa/Kelurahan
            $table->string('district')->nullable(); // Kecamatan
            $table->string('city')->nullable(); // Kota/Kabupaten
            $table->string('province')->nullable(); // Provinsi
            $table->string('postal_code')->nullable(); // Kode pos
            $table->string('country')->nullable(); // Negara
            $table->boolean('is_primary')->default(false); // Apakah alamat utama?
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraint
            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_addresses');
    }
};
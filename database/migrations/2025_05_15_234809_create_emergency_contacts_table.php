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
        Schema::create('emergency_contacts', function (Blueprint $table) {
            // Gunakan UUID sebagai primary key
            $table->uuid('id')->primary();

            // Foreign key ke employees (juga pakai UUID)
            $table->uuid('employee_id');

            // Informasi kontak darurat
            $table->string('name'); // Nama kontak darurat
            $table->string('relationship'); // Hubungan dengan karyawan (misalnya: Ayah, Ibu, Saudara)
            $table->string('phone_number'); // Nomor telepon kontak darurat
            $table->text('address')->nullable(); // Alamat lengkap kontak darurat
            $table->boolean('is_primary')->default(false); // Apakah ini kontak utama?

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
        Schema::dropIfExists('emergency_contacts');
    }
};
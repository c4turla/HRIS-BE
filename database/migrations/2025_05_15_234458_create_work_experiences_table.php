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
        Schema::create('work_experiences', function (Blueprint $table) {
            // Gunakan UUID sebagai primary key
            $table->uuid('id')->primary();

            // Foreign key ke employees (juga pakai UUID)
            $table->uuid('employee_id');

            // Informasi pengalaman kerja
            $table->string('company_name'); // Nama perusahaan
            $table->string('position'); // Jabatan
            $table->date('start_date'); // Tanggal mulai kerja
            $table->date('end_date')->nullable(); // Tanggal akhir kerja (bisa null jika masih aktif)
            $table->text('job_description')->nullable(); // Deskripsi pekerjaan
            $table->text('reason_for_leaving')->nullable(); // Alasan berhenti
            $table->string('reference_name')->nullable(); // Nama kontak referensi
            $table->string('reference_contact')->nullable(); // Kontak referensi
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
        Schema::dropIfExists('work_experiences');
    }
};
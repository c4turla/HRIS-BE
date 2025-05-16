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
        Schema::create('education_history', function (Blueprint $table) {
            // Gunakan UUID sebagai primary key
            $table->uuid('id')->primary();

            // Foreign key ke employees (juga pakai UUID)
            $table->uuid('employee_id');

            // Informasi riwayat pendidikan
            $table->string('education_level'); // Misalnya: SD, SMP, SMA, D3, S1, S2, dll
            $table->string('institution_name'); // Nama institusi pendidikan
            $table->string('major')->nullable(); // Jurusan
            $table->year('start_year'); // Tahun mulai
            $table->year('end_year')->nullable(); // Tahun selesai
            $table->decimal('gpa', 3, 2)->nullable(); // IPK atau nilai akhir (misalnya 3.75)

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
        Schema::dropIfExists('education_history');
    }
};
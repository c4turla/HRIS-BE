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
        Schema::create('financial_info', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Primary key auto-increment
            $table->uuid('employee_id'); // Relasi ke tabel employees (UUID)
            $table->string('npwp_number')->nullable(); // Nomor NPWP
            $table->string('tax_status')->nullable(); // Status Pajak, misalnya: TK/0, K/1, dll
            $table->string('bpjs_kesehatan_number')->nullable(); // Nomor BPJS Kesehatan
            $table->string('bpjs_ketenagakerjaan_number')->nullable(); // Nomor BPJS Ketenagakerjaan (Jamsostek)
            $table->string('bank_name')->nullable(); // Nama bank
            $table->string('bank_account_number')->nullable(); // Nomor rekening bank
            $table->string('bank_account_name')->nullable(); // Nama pemilik rekening
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraint (opsional tapi disarankan)
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
        Schema::dropIfExists('financial_info');
    }
};
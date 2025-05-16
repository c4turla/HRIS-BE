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
        Schema::create('employees', function (Blueprint $table) {
            // Gunakan UUID sebagai primary key
            $table->uuid('id')->primary();
            
            $table->string('employee_id')->unique(); // ID karyawan internal
            $table->string('nik')->unique(); // Nomor Induk Kependudukan / NIK
            $table->string('full_name');
            $table->enum('gender', ['male', 'female'])->nullable(); // Jenis kelamin
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->char('blood_type', 2)->nullable(); // Misalnya A, B, AB, O (+/-)
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->text('profile_photo_url')->nullable(); // URL foto profil
            $table->unsignedBigInteger('current_company_id')->nullable(); // Foreign key ke companies
            $table->unsignedBigInteger('current_department_id')->nullable(); // Foreign key ke departments
            $table->unsignedBigInteger('current_position_id')->nullable(); // Foreign key ke positions
            $table->string('current_employment_status')->nullable(); // Misalnya: Permanent, Contract, Probation
            $table->date('join_date')->nullable(); // Tanggal bergabung
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
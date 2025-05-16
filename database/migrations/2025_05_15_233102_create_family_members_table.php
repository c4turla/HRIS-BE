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
        Schema::create('family_members', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Gunakan bigIncrements jika perlu custom
            $table->uuid('employee_id'); // Relasi ke tabel employees (UUID)
            $table->string('relationship_type'); // Misalnya: Ayah, Ibu, Anak, Suami, Istri
            $table->string('full_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('occupation')->nullable(); // Pekerjaan anggota keluarga
            $table->boolean('is_dependent')->default(false); // Apakah tanggungan?
            $table->string('nik')->unique()->nullable(); // NIK Kependudukan
            $table->timestamps();

            // Tambahkan foreign key constraint (opsional tapi disarankan)
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
        Schema::dropIfExists('family_members');
    }
};
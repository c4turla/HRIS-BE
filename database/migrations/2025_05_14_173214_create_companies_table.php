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
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 255); // VARCHAR(255) NOT NULL
            $table->text('address')->nullable(); // TEXT
            $table->string('phone', 30)->nullable(); // VARCHAR(30)
            $table->string('pic', 50)->nullable(); // VARCHAR(50)
            $table->string('email', 100)->nullable(); // VARCHAR(100)
            $table->string('website', 255)->nullable(); // VARCHAR(255)
            $table->string('tax_id', 50)->nullable(); // VARCHAR(50)
            $table->string('logo', 255)->nullable(); // VARCHAR(255)
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active'); // ENUM
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

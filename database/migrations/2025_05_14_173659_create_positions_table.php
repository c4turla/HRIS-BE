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
        Schema::create('company_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('type', 50);
            $table->string('address');
            $table->string('city', 100);
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->default('Indonesia');
            $table->string('phone', 20)->nullable();
            $table->boolean('is_headquarters')->default(false);
            $table->timestamps();

            // Foreign Key Constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_locations');
    }
};

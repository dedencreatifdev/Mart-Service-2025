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
        Schema::create('service_advisors', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('nama', 100);
            $table->text('alamat')->nullable();
            $table->string('no_telepon', 100);
            $table->string('email', 100)->nullable();
            $table->string('no_ktp', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_advisors');
    }
};

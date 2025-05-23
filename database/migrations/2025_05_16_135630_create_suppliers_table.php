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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('type_id');
            $table->string('type_nama', 20);
            $table->integer('supplier_group_id')->nullable();
            $table->string('supplier_group_nama', 100)->nullable();

            $table->string('nama', 55);
            $table->string('company');
            $table->text('alamat');
            $table->string('kota', 55);
            $table->string('negara', 55)->nullable();
            $table->string('kode_pos', 8)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('no_phone', 20);
            $table->string('email', 100);
            $table->string('npwp', 100)->nullable();

            $table->string('cf1', 100)->nullable();
            $table->string('cf2', 100)->nullable();
            $table->string('cf3', 100)->nullable();
            $table->string('cf4', 100)->nullable();
            $table->string('cf5', 100)->nullable();
            $table->string('cf6', 100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};

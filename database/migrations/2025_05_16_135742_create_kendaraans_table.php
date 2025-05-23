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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_polisi', 20)->unique();
            $table->string('kdnsb', 10)->nullable();
            $table->string('kdjns', 10)->nullable();
            $table->string('kendaraan', 50)->nullable();
            $table->string('kdtype', 10)->nullable();
            $table->string('no_chasis', 50)->nullable();
            $table->string('no_mesin', 50)->nullable();
            $table->string('no_seri', 50)->nullable();
            $table->string('tahun')->nullable();
            $table->string('warna', 30)->nullable();
            $table->string('no_bpkb', 50)->nullable();
            $table->string('no_faktur', 50)->nullable();
            $table->string('tg_stnk')->nullable();
            $table->string('atasnama', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('km_akhir')->nullable();
            $table->string('km_hari')->nullable();
            $table->string('tg_jual')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('tg_daftar')->nullable();
            $table->string('id_kode', 36)->nullable();
            $table->string('id_comp', 36)->nullable();
            $table->string('flag')->nullable();
            $table->string('ft_nmpemilik', 100)->nullable();
            $table->string('ft_jnskend', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};

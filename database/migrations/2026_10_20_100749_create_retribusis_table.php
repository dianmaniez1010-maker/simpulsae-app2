<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('retribusis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal_bayar');
            $table->enum('status_pembayaran', ['lunas', 'menunggak'])->default('lunas');
            $table->string('metode_pembayaran')->default('transfer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retribusis');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('revisi_surats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_dibuat')->default(now());
            $table->string('pemberi_revisi');
            $table->string('file_surat')->nullable(); // Bisa diisi jika ada file
            $table->enum('status_revisi', ['Pending', 'In Progress', 'completed']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('revisi_surat');
    }
};

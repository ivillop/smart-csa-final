<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disposisi_surats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_dibuat')->default(now());
            $table->string('pemberi_disposisi');
            $table->string('penerima_disposisi');
            $table->text('instruksi_disposisi');
            $table->enum('status_disposisi', ['Pending', 'In Progress', 'Completed']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disposisi_surat');
    }
};

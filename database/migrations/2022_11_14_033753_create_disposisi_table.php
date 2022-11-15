<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_terima');
            $table->string('tujuan');
            $table->string('catatan')->nullable();
            $table->enum('tindak_lanjut', ['Diketahui','pendapat','segera','lanjut','penjelasan','diteliti','dilaksanakan','disimpan']);
            $table->string('keterangan')->nullable();
            $table->string('dokumen'); 
            $table->foreignId('tujuan_id');
            $table->foreignId('surat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi');
    }
};

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
        Schema::create('dataekodigis', function (Blueprint $table) {
            $table->id();
            $table->string('sls_id',14)->nullable();
            $table->string('namapemilik');
            $table->tinyInteger('jmlusaha')->unsigned();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('namausaha',50);
            $table->string('keteranganekodigi',255);
            $table->string('alamatusaha',255);

            
            $table->foreign('sls_id')->references('id')->on('sls')->onDelete('set null')->change();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataekodigis');
    }
};

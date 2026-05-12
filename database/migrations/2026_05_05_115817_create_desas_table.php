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
        Schema::create('desas', function (Blueprint $table) {
             $table->string('id',10)->primary(); // manually filled, example: 64
             $table->string('kecamatan_id',7)->nullable();
             $table->string('iddesa',3);
             $table->string('nmdesa');
             $table->timestamps();

             $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('set null')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};

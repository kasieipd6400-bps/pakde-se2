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
        Schema::create('kabupatens', function (Blueprint $table) {
             $table->string('id',4)->primary(); // manually filled, example: 64
             $table->string('provinsi_id',2)->nullable();
             $table->string('idkab',2);
             $table->string('nmkab');
             $table->timestamps();

             $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('set null')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupatens');
    }
};

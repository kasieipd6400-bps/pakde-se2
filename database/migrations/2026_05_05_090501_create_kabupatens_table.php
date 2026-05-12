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
            $table->id();
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->string('kodekab',2);
            $table->string('idkab',4);
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

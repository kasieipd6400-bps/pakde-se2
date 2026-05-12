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
        Schema::create('sls', function (Blueprint $table) {
            $table->string('id',14)->primary(); // manually filled, example: 64
             $table->string('desa_id',10)->nullable();
             $table->string('idsls',4);
             $table->string('nmsls');
             $table->timestamps();

             $table->foreign('desa_id')->references('id')->on('desas')->onDelete('set null')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sls');
    }
};

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
        Schema::table('kabupatens', function (Blueprint $table) {
             $table->string('provinsi_id',2)->nullable()->change();
             $table->foreign('provinsi_id')->references('id')->on('provinsis')->onDelete('set null')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            //
        });
    }
};

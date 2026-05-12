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
        Schema::table('dataekodigis', function (Blueprint $table) {
            $table->dropColumn('jmlusaha');
            $table->string('kabupaten_id',4)->nullable();

            $table->foreign('kabupaten_id')->references('id')->on('kabupatens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dataekodigis', function (Blueprint $table) {
            //
        });
    }
};

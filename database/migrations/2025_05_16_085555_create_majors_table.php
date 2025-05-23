<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('majors', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('faculty_id');
        $table->string('name');
        $table->timestamps();

        $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('agenda', function (Blueprint $table) {
        $table->id();
        $table->date('fecha');
        $table->time('hora');
        $table->unsignedBigInteger('idpersona');
        $table->unsignedBigInteger('idimagen');
        $table->foreign('idpersona')->references('idpersona')->on('personas')->onDelete('cascade');
        $table->foreign('idimagen')->references('idimagen')->on('imagenes')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};

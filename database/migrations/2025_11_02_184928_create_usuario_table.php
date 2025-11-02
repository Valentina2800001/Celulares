<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nombre', 100);
            $table->string('correo', 100)->unique();
            $table->string('rol', 50);
            $table->string('contraseña', 255);
            $table->integer('numIdentificacion')->nullable();
            $table->string('estado', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};


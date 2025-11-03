<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
 $table->string('id', 10)->primary();
            $table->string('nombre', 100);
            $table->string('categoria_id', 10)->nullable();
            $table->decimal('precio', 10, 2);
            $table->string('color', 50)->nullable();
            $table->integer('stock')->default(0);
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('usuario_id', 10)->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categoria')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('usuario_id')
                  ->references('id')
                  ->on('usuario')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

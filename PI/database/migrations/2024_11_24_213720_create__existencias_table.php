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
        Schema::create('existencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id'); 
            $table->unsignedBigInteger('producto_id'); 
            $table->unsignedBigInteger('proveedor_id'); 
            $table->integer('existencia')->default(0); 
            $table->decimal('precio_venta', 8, 2); 
            $table->timestamp('fecha_entrada')->nullable(); 
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->String('rut', 10)->primary();
            $table->String('nombre', 40);
            $table->date('fecha_nac');
            $table->softDeletes();
            //$table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

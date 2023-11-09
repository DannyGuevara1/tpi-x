<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_sale');
            $table->foreignId('id_product_name')
            ->nullable()
            ->constrained('products')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->unsignedInteger('amount');
            //HACER INNER JOIN ó RELACION DE TABLAS
            $table->foreignId('id_history')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->double('price');
            $table->decimal('size');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};

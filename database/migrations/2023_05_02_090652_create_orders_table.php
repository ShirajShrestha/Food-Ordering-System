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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('menu_id');
            $table->integer('quantity');
            $table->decimal('price',10,2);
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onupdate('cascade')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onupdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

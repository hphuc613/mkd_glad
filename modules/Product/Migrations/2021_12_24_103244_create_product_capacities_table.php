<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCapacitiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('product_capacities', function (Blueprint $table) {
            $table->id();
            $table->string('capacity')->nullable();
            $table->string('unit')->nullable();
            $table->double('price')->default(0);
            $table->integer('stock_in')->default(0);
            $table->double('discount')->default(0);
            $table->unsignedBigInteger('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('product_capacities');
    }
}

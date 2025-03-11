<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental',function(Blueprint $table){
            $table->id('rental_id');
            $table->timestamp('rental_date')->useCurrent();
            $table->foreignId('inventory_id')->constrained('inventory', 'inventory_id')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customer', 'customer_id')->onDelete('cascade');
            $table->timestamp('return_date')->nullable();
            $table->foreignId('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->timestamp('last_update')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental');
    }
};

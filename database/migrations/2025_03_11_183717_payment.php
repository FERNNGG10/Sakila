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
        Schema::create('payment',function(Blueprint $table){
            $table->id('payment_id');
            $table->foreignId('customer_id')->constrained('customer', 'customer_id')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->foreignId('rental_id')->constrained('rental', 'rental_id')->onDelete('cascade');
            $table->decimal('amount',5,2);
            $table->timestamp('payment_date')->useCurrent();
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
        Schema::dropIfExists('payment');
    }
};

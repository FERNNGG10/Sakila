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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id');
            $table->foreignId('store_id')->constrained('store', 'store_id')->onDelete('cascade');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 50)->nullable();
            $table->foreignId('address_id')->constrained('address', 'address_id')->onDelete('cascade');
            $table->boolean('active')->default(1);
            $table->timestamp('create_date')->useCurrent();
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
        Schema::dropIfExists('customer');
    }
};

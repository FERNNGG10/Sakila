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
        Schema::create('address',function(Blueprint $table){
           $table->id('address_id');
           $table->string('address',50);
           $table->string('address2',50)->nullable();
           $table->string('district',20);
           $table->foreignId('city_id')->constrained('city','city_id')->onDelete('cascade');
           $table->char('postal_code',10)->nullable();
           $table->char('phone',20);
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
        Schema::dropIfExists('address');
    }
};

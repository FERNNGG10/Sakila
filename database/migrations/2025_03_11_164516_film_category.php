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
        Schema::create('film_category',function(Blueprint $table){
            $table->foreignId('film_id')->constrained('film','film_id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('category','category_id')->onDelete('cascade');
            $table->timestamp('last_update')->useCurrent();
            $table->primary(['film_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_category');
    }
};

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
        Schema::create('film_actor', function (Blueprint $table) {
            $table->foreignId('actor_id')->constrained('actor','actor_id')->onDelete('cascade');
            $table->foreignId('film_id')->constrained('film','film_id')->onDelete('cascade');
            $table->timestamp('last_update')->useCurrent();
            $table->primary(['actor_id', 'film_id']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_actor');
    }
};

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
        Schema::create('film',function(Blueprint $table){
            $table->id('film_id');
            $table->string('title',255);
            $table->text('description')->nullable();
            $table->year('release_year')->nullable();
            $table->foreignId('language_id')->constrained('language','language_id')->onDelete('cascade');
            $table->foreignId('original_language_id')->constrained('language','language_id')->onDelete('cascade')->nullable();
            $table->tinyInteger('rental_duration');
            $table->decimal('rental_rate',4,2)->default(4.99);
            $table->unsignedSmallInteger('length')->nullable();
            $table->decimal('replacement_cost',5,2)->default(19.99);
            $table->enum('rating',['G','PG','PG-13','R','NC-17'])->default('G');
            $table->set('special_features',['Trailers','Commentaries','Deleted Scenes','Behind the Scenes'])->nullable();
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
        Schema::dropIfExists('film');
    }
};

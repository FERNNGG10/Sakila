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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('staff_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->foreignId('address_id')->constrained('address', 'address_id')->onDelete('cascade');
            $table->binary('picture')->nullable();
            $table->string('email', 50)->nullable();
            $table->boolean('active')->default(1);
            $table->string('username', 16);
            $table->string('password', 40)->nullable();
            $table->timestamp('last_update')->useCurrent();
        });

        Schema::create('store', function (Blueprint $table) {
            $table->id('store_id');
            $table->foreignId('manager_staff_id')->constrained('staff', 'staff_id')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('address', 'address_id')->onDelete('cascade');
            $table->timestamp('last_update')->useCurrent();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->foreignId('store_id')->constrained('store', 'store_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
            $table->dropColumn('store_id');
        });

        Schema::dropIfExists('store');
        Schema::dropIfExists('staff');
    }
};
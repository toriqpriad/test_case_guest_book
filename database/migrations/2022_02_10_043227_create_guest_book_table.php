<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_book', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable()->default(NULL);
            $table->string('lastname')->nullable()->default(NULL);
            $table->string('organization')->nullable()->default(NULL);
            $table->integer('province_id')->nullable()->default(NULL);
            $table->integer('city_id')->nullable()->default(NULL);
            $table->string('address')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_book');
    }
}

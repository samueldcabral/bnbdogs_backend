<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('booking_date');
            $table->integer('duration')->nullable();
            $table->date('check-in_date')->nullable();
            $table->date('check-out_date')->nullable();
            $table->string('status')->default('pending');
            $table->float('day_price');
            $table->unsignedBigInteger('dog_id');
            $table->foreign('dog_id')->references('id')->on('dogs')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date("check_in");
            $table->date("check_out");
            $table->integer("number_of_guests");
            $table->string("destination_name");
            $table->foreign("destination_name")->references("destination_name")->on('destinations');
            $table->string("tour_name");
            $table->foreign("tour_name")->references("tour_name")->on('tours');
            $table->string("accommodation_name");
            $table->foreign("accommodation_name")->references("accommodation_name")->on('accommodations');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
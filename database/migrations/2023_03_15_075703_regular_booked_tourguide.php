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
        Schema::create('regular_booked_tourguide', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('n_of_people');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tourguide_id');
            $table->foreign('tourguide_id')->references('id')->on('tourguides')->onDelete('cascade')->onUpdate('cascade');
            // managed by tourguide
            $table->enum('status',['Accept','pending','Reject'])->default('pending');
            $table->date("check_in");
            $table->date("check_out");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

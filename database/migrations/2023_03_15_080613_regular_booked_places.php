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
        Schema::create('regular_booked_Places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('place_id');
            $table->foreign('tourguide_id')->references('id')->on('tourguides')->onDelete('cascade')->onUpdate('cascade');
            // managed by admin
            $table->enum('status',['Accept','pending','Reject'])->default('pending');
            $table->dateTime("check_in");
            $table->dateTime("check_out");
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

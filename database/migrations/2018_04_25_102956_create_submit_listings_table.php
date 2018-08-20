<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('userEmail');
            $table->string('status');
            $table->string('name');
            $table->string('listingType');
            $table->unsignedInteger('price');
            $table->string('address');
            $table->string('lat');
            $table->string('long');
            $table->string('propertyType');
            $table->string('city');
            $table->string('phone');
            $table->string('rooms');
            $table->string('baths');
            $table->string('kitchen');
            $table->string('wifi');
            $table->string('iron');
            $table->string('path');
            $table->string('parking');
            $table->string('additionalDescription');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submit_listings');
    }
}

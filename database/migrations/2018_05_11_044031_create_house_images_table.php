<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("house_id")->unsigned();

            $table->string("path",150);
            $table->timestamps();
        });

        Schema::table('house_images', function(Blueprint $table){
            $table->foreign('house_id')->references('id')->on('submit_listings');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_images', function(Blueprint $table){
            $table->dropForeign(['house_id']);
        });
        Schema::dropIfExists('house_images');
    }
}

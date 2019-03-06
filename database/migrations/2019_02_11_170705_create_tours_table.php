<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('hero_short_description')->nullable();
            $table->string('hero_description')->nullable();
            $table->boolean('featured');
            $table->boolean('recommended');
            $table->string('type')->default('normal');
            $table->string('card_description')->nullable();
            $table->string('slug');
            $table->json('itinerary')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('included')->nullable();
            $table->string('excluded')->nullable();
            $table->integer('price');
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
        Schema::dropIfExists('tours');
    }
}

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
            $table->string('slug');
            $table->text('details')->nullable();
            $table->integer('price');
            $table->string('type')->default('normal');
            $table->boolean('featured')->default(1);
            $table->text('hero_short_description')->nullable();
            $table->text('hero_description')->nullable();
            $table->boolean('recommended')->default(1);
            $table->text('card_description')->nullable();
            $table->json('itinerary')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('included')->nullable();
            $table->string('excluded')->nullable();
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

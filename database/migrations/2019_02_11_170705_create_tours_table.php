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
            $table->text('description')->nullable();
            $table->integer('price');
            $table->string('type')->default('normal');
            $table->boolean('featured')->default(1);
            $table->boolean('recommended')->default(1);
            $table->text('hero_description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('departure_time')->nullable();
            $table->jsonb('itinerary')->nullable();
            $table->jsonb('included')->nullable();
            $table->jsonb('excluded')->nullable();
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

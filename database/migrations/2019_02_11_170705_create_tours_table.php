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
            $table->string('hero_short_description');
            $table->string('hero_description');
            $table->boolean('featured');
            $table->boolean('recommended');
            $table->string('type')->default('normal');
            $table->string('card_description');
            $table->string('slug');
            $table->string('title');
            $table->text('details')->nullable();
            $table->string('departure_location')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('included')->nullable();
            $table->string('notIncluded')->nullable();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->text("name");
            $table->text('description');
            $table->string("type");
            $table->string('sport_type')->nullable();
            $table->string('city');
            $table->date("date1");
            $table->date("date2");
            $table->integer('quota');
            $table->decimal('price', 10, 2);
            $table->integer('approved')->default(0);
            $table->unsignedInteger('owner');
            $table->integer('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}

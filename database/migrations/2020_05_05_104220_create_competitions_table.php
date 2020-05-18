<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('type');
            // $table->string('event');('out')
            // $table->string('result_type');('out')
            $table->string('image');
            $table->string('contact');
            $table->string('time_zone');
            $table->dateTime('competition_start');
            $table->dateTime('competition_end');
            $table->dateTime('competition_start_UTC');
            $table->dateTime('competition_end_UTC');
            $table->string('url')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
}

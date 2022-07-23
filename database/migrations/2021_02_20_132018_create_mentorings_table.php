<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->longText('description');
            $table->longText('link');
            $table->longText('thumbnail');
            $table->integer('availability');
            $table->double('price', 15, 8);
            $table->string('duration');
            $table->json('times');
            $table->json('form')->nullable();
            $table->json('form_responses')->nullable();
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
        Schema::dropIfExists('mentorings');
    }
}

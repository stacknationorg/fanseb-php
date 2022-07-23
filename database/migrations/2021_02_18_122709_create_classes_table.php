<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id');
            $table->bigInteger('owner_id');
            $table->string('title');
            $table->longText('description');
            $table->longText('thumbnail');
            $table->longText('image1');
            $table->longText('image2');
            $table->date('date');
            $table->time('time');
            $table->double('price', 15, 8);
            $table->double('discount', 15, 8)->default(0);
            $table->string('duration');
            $table->string('meeting_id')->nullable();
            $table->string('meeting_site')->nullable();
            $table->string('meeting_user_id')->nullable();
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
        Schema::dropIfExists('classes');
    }
}

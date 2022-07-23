<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id');
            $table->bigInteger('category_id');
            $table->string('title');
            $table->longText('description');
            $table->longText('thumbnail');
            $table->longText('images');
            $table->date('date');
            $table->time('time');
            $table->double('price', 15, 8);
            $table->double('discount', 15, 8)->default(0);
            $table->string('duration');
            $table->json('form')->nullable();
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
        Schema::dropIfExists('webinars');
    }
}

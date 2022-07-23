<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_paths', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id');
            $table->string('title');
            $table->longText('description');
            $table->longText('thumbnail');
            $table->longText('images');
            $table->double('price', 15, 8);
            $table->double('discount', 15, 8)->default(0);
            $table->json('courses')->nullable();
            $table->json('mentorings')->nullable();
            $table->json('tests')->nullable();
            $table->longText('certificate')->nullable();
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
        Schema::dropIfExists('learning_paths');
    }
}

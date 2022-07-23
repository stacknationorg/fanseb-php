<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("instructor_id");
            $table->bigInteger("group_id")->nullable();
            $table->bigInteger("forum_id")->nullable();
            $table->string("title");
            $table->string("sub_title")->nullable();
            $table->longText("description")->nullable();
            $table->string("language")->nullable();
            $table->string("level")->nullable();
            $table->bigInteger("cid")->nullable();
            $table->string("image")->nullable();
            $table->string("icon")->nullable();
            $table->string("video")->nullable();
            $table->float('price')->nullable();
            $table->mediumText('learnings')->nullable();
            $table->mediumText('requirements')->nullable();
            $table->mediumText('target')->nullable();
            $table->json('content')->nullable();
            $table->boolean("published")->default(0);
            $table->boolean("review")->default(0);
            $table->boolean("approved")->default(0);
            $table->boolean("deleted")->default(0);
            $table->json('ratings')->nullable();
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
        Schema::dropIfExists('courses');
    }
}

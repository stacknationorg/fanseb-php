<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->boolean('approved')->default(0);
            $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->bigInteger('inst_id')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('category')->nullable();
            $table->longText('description')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('poc_name')->nullable();
            $table->string('poc_email')->nullable();
            $table->string('poc_mobile')->nullable();
            $table->string('poc_identity')->nullable();
            $table->string('poc_residence')->nullable();
            $table->string('reg_doc')->nullable();
            $table->string('gstin')->nullable();
            $table->string('gst_doc')->nullable();
            $table->string('cin')->nullable();
            $table->string('company_master')->nullable();
            $table->string('aff_to')->nullable();
            $table->string('founded_by')->nullable();
            $table->dateTime('founded')->nullable();
            $table->dateTime('zoom_code')->nullable();
            $table->double('wallet', 15, 8)->default(0);
            $table->bigInteger('bank_acc_id')->nullable();
            $table->bigInteger('upi_acc_id')->nullable();
            $table->json('experiences')->nullable();
            $table->json('skills')->nullable();
            $table->json('projects')->nullable();
            $table->json('achievements')->nullable();
            $table->json('social')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

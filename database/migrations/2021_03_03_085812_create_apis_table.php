<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {
            $table->id();
            $table->string('paytm_merchant_id')->default("QUBjmR38603324504030");
            $table->string('paytm_merchant_key')->default("6BEjaxfW8&GS9V04");
            $table->string('paytm_channel')->default("WEB");
            $table->string('paytm_industry')->default("edtech");
            $table->string('paytm_website')->default("tamenterprise.com");
            $table->string('razorpay_key_id')->default("rzp_test_4PvTP1ZGFwCdHQ");
            $table->string('razorpay_key_secret')->default("BvfBsxE7pa6J9HbFET9bJFU7");
            $table->string('razorpay_account_no')->default("2323230061712199");
            $table->string('zoom_api_key')->default("_yc5OqqQTfWGP2Q4MKZEKA");
            $table->string('zoom_api_secret')->default("MZ1I2V0diqUhZ30LS7upN5EPIufmO0HFg4mf");
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
        Schema::dropIfExists('apis');
    }
}

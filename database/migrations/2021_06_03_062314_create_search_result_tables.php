<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchResultTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->comment('идентификатор пользователя');
            $table->string('kwords', 100)->comment('строка запроса');
            $table->timestamps();
        });

        Schema::create('search_requests_data', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('search_request_id')->unsigned()->comment('идентификатор запроса');
            $table->foreign('search_request_id')->references('id')->on('search_requests')->onDelete('cascade');

            $table->Text('data')->comment('текст заявки');
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
        Schema::dropIfExists('search_requests_data');
        Schema::dropIfExists('search_requests');

    }
}

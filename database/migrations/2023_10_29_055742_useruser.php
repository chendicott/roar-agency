<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('relation_user_id');
            $table->string('user_role')->comment('e.g. participant, support worker');

            $table->foreign('relation_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['relation_user_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_user');
    }
};

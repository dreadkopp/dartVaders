<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('wurfhand',['links','rechts'])->nullable();
            $table->string('setup_arrows')->nullable();
            $table->string('setup_board')->nullable();
            $table->string('fav_finish')->nullable();
            $table->string('entry_music')->nullable();
            $table->string('fav_player')->nullable();
            $table->string('patches')->nullable();
            $table->integer('hundredeighties')->default(0);
            $table->integer('greatest_finish')->nullable();
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
        Schema::dropIfExists('member_infos');
    }
}

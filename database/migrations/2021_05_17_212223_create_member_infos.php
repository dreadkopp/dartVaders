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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('wurfhand',['links','rechts'])->nullable();
            $table->string('setup_arrows')->nullable();
            $table->string('setup_board')->nullable();
            $table->string('fav_finish')->nullable();
            $table->string('entry_music')->nullable();
            $table->string('fav_player')->nullable();
            $table->string('patches')->nullable();
            $table->integer('hundredeighties')->default(0);
            $table->integer('greatest_finish')->nullable();
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('wurfhand');
            $table->dropColumn('setup_arrows');
            $table->dropColumn('setup_board');
            $table->dropColumn('fav_finish');
            $table->dropColumn('entry_music');
            $table->dropColumn('fav_player');
            $table->dropColumn('patches');
            $table->dropColumn('hundredeighties');
            $table->dropColumn('greatest_finish');
            $table->dropColumn('bio');
        });
    }
}

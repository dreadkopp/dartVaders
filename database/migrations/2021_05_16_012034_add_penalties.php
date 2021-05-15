<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenalties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalties',function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('value');
            $table->timestamps();
        });

        Schema::create('penalties_log',function(Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->float('value');
            $table->string('name');
            $table->boolean('paid')->default(0);
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
        Schema::dropIfExists('penalties');
        Schema::dropIfExists('penalties_log');
    }
}

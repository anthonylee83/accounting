<?php
/*
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   /* public function up()
    {

        Schema::create('event_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('event_type_id');
            $table->foreign('event_type_id')->references('id')->on('event_types');
            $table->text('message');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *//*
    public function down()
    {
        Schema::dropIfExists('event_log');
    }
}
*/

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Error;

class CreateErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->timestamps();
        });

        Error::create(['message' => 'Your balance does not match. Plese check your entries']);
        Error::create(['message' => 'You cannot have a 0 balance amount!']);
        Error::create(['message' => 'Please select an account!']);
        Error::create(['message' => 'You cannot use the same account twice!']);
        Error::create(['message' => 'An error has occurred']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('errors');
    }
}

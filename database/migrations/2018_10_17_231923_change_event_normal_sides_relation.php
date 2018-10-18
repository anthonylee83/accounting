<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventNormalSidesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chart_of_accounts', function ($table) {
            $table->unsignedInteger('account_normal_side')->change();
            $table->renameColumn('account_normal_side', 'account_normal_side_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chart_of_accounts', function ($table) {
            $table->string('account_normal_side_id')->change();
            $table->renameColumn('account_normal_side_id', 'account_normal_side');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventSubtypesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chart_of_accounts', function ($table) {
            $table->unsignedInteger('account_subtype')->change();
            $table->renameColumn('account_subtype', 'account_subtype_id');
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
            $table->string('account_subtype_id')->change();
            $table->renameColumn('account_subtype_id', 'account_subtype');
        });
    }
}

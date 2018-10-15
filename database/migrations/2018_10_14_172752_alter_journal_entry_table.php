<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJournalEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            $table->dropForeign('journal_entries_account_id_foreign');
            $table->dropForeign('journal_entries_user_id_foreign');
            $table->dropColumn('debit/credit');
            $table->dropColumn('amount');
            $table->dropColumn('user_id');
            $table->dropColumn('description');
            $table->dropColumn('account_id');
            $table->dropColumn('date');
            $table->bigInteger('reference');
            $table->boolean('approved');
            $table->unsignedInteger('approval_user_id');
            $table->unsignedInteger('created_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journal_entries', function (Blueprint $table) {
            //
        });
    }
}

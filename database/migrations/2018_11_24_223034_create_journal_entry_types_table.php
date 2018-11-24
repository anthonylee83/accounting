<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\JournalEntryType;

class CreateJournalEntryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entry_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });

        JournalEntryType::create(['type' => 'Unadjusted']);
        JournalEntryType::create(['type' => 'Adjusted']);
        JournalEntryType::create(['type' => 'Closing']);

        Schema::table('journal_entries', function ($table) {
            $table->unsignedInteger('journal_entry_type_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journal_entry_types');
    }
}

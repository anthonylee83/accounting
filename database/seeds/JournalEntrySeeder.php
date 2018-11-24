<?php

use Illuminate\Database\Seeder;
use App\JournalEntry;

class JournalEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $approvalStatusID = DB::table('status')->where('state', 'Pending')->value('id');
        //Journal Entry 1
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 2
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 3
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 4
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 5
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 6
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 7
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 8
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 9
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 10
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 11
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 12
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 13
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 14
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 15
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 16
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 17
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 18
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 19
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 20
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 4,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 21
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 22
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 23
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 24
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 25
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 26
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
        //Journal Entry 27
        JournalEntry::create([
            'status_id'             => $approvalStatusID,
            'created_user_id'       => 5,
            'document_reference_id' => 0,
            'reference'             => rand(10000, 999999),
            'approval_user_id'      => 0,
            'description'           => ' ',
            'comments'              => ' '
        ]);
    }
}

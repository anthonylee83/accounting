<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccessLevelSeeder::class);
        $this->call(AdminUserSeed::class);
        $this->call(AccountTypeSeeder::class);
        $this->call(AccountSubtypeSeeder::class);
        $this->call(NormalSideSeeder::class);
        $this->call(ChartOfAccountsSeeder::class);
        $this->call(UserSeed::class);
        $this->call(ManagerUserSeeder::class);
        $this->call(StandardUserSeed::class);
        $this->call(TransactionSeeder::class);
        $this->call(JournalEntrySeeder::class);
		$this->call(RatioTableSeeder::class);

    }
}

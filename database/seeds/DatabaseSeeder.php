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
        $this->call(FacultiesTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ManagementsTableSeeder::class);
        $this->call(ManagementMembersTableSeeder::class);
        $this->call(CommitteesTableSeeder::class);
        $this->call(CommitteeMembersTableSeeder::class);
        $this->call(ContactProfileTableSeeder::class);
    }
}

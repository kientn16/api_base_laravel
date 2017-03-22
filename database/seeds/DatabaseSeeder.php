<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //////////////////////
        // Clear dummy data //
        //////////////////////
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        App\Models\User::truncate();

        //////////
        // Seed //
        //////////
        factory(App\Models\User::class, 10)->create();
    }
}

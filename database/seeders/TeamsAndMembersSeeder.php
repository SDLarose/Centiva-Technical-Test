<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsAndMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Team::factory(10)->create()->each(function($team) {
            \App\Models\Member::factory(10)->create(['team' => $team->id]);
        });
    }
}

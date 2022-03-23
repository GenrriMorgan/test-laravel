<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
                     ->count(2)
                    ->state(new Sequence(
                        ['role_id' => 1],
                        ['role_id' => 2],
                        ))
                    ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->count(10)->create();
        Diary::factory(50)->recycle($user)->create();
    }
}

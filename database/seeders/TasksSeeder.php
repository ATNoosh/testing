<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::exists()) {
            $this->command->warn('There is no user in DB!!! May be it\'s better to run UserSeeder first');
            return;
        }
        
        $count = $this->command->ask('How many fake tasks do you need?') ?? env('FAKE_TASKS_COUNT');
        Task::factory()->count(intval($count))->create();
    }
}

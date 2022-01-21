<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Master Admin',
            'email' => 'admin@email.com',
            'password' => '$2y$10$U1NM8dtq970kSFy0nucHxO1W4tdjIZQAQKkOdgrV4l6Ve9Nf33KaS',
            'avatar' => 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y',
            'role' => 'Admin'
        ]);
    }
}

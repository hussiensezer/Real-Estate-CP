<?php

use App\Models\User;
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
        $user = User::create([
            'name' => 'v1',
            'email' => 'v1@app.com',
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
        $user->assignRole("Super Admin");
    }
}

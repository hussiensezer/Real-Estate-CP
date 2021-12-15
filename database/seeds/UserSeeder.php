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
            'name' => 'Testing',
            'email' => 'testing@app.com',
            'password' => bcrypt('123456'),
            'status' => 1
        ]);
        $user->assignRole("Super Admin");
    }
}

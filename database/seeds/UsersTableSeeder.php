<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Only seed unless users already exist
        if (User::count()) return;

        $role = Role::where('name', 'admin')->firstOrFail();

        $credentials = [
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'locale' => 'en'
        ];

        $user = User::make($credentials);
        $user->role()->associate($role);
        $user->save();
    }
}

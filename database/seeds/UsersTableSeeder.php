<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use App\User;

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
            'email' => 'admin@matryoshkadoll.me',
            'password' => bcrypt('password'),
            'locale' => 'en'
        ];

        $user = User::make($credentials);
        $user->role()->associate($role);
        $user->save();

        // Only seed additional users on development
        if (!App::environment('local')) return;

        $role = Role::where('name', 'vendor')->firstOrFail();

        $credentials = [
            'name' => 'Vendor',
            'email' => 'vendor@matryoshkadoll.me',
            'password' => bcrypt('password'),
            'locale' => 'en'
        ];

        $user = User::make($credentials);
        $user->role()->associate($role);
        $user->save();

        $credentials = [
            'name' => 'User',
            'email' => 'user@matryoshkadoll.me',
            'password' => bcrypt('password'),
            'locale' => 'en'
        ];

        $user = User::create($credentials);
    }
}

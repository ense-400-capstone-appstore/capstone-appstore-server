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

        $this->createUser([
            'name' => 'Administrator',
            'email' => 'admin@matryoshkadoll.me',
            'password' => bcrypt('password')
        ], 'admin');

        // Only seed additional users on development
        if (!App::environment('local')) return;

        $this->createUser([
            'name' => 'Vendor',
            'email' => 'vendor@matryoshkadoll.me',
            'password' => bcrypt('password')
        ], 'vendor');

        $this->createUser([
            'name' => 'User',
            'email' => 'user@matryoshkadoll.me',
            'password' => bcrypt('password')
        ]);
    }

    /**
     * Create a user with the given user details and role name.
     *
     * @param array $userDetails
     * @param string $roleName
     */
    protected function createUser(array $userDetails, string $roleName = 'user')
    {
        $role = Role::where('name', $roleName)->firstOrFail();

        $user = User::make($userDetails);
        $user->role()->associate($role);
        $user->save();
    }
}

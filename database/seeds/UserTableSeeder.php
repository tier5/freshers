<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'Deepjyoti';
        $user->last_name = 'Mukherjee';
        $user->email = 'deepjyotimukherjee.suman@gmail.com';
        $user->password = bcrypt('123456');
        $user->date_of_birth = '1993-10-15';
        $user->country_id = 76;
        $user->contact_number = 9674768037;
        $user->profile_pic = 'default.jpg';
        $user->save();
    }
}

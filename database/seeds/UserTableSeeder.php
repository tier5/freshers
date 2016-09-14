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
        $user->profile_picture = 'default.jpg';
        $user->save();

        $user = new User();
        $user->first_name = 'Akash';
        $user->last_name = 'PJ';
        $user->email = 'akashpj69frndz@gmail.com';
        $user->password = bcrypt('!Aworker2#');
        $user->date_of_birth = '1993-9-15';
        $user->country_id = 76;
        $user->contact_number = 8961321401;
        $user->profile_picture = 'akashpic.jpg';
        $user->save();


        $user = new User();
        $user->first_name = 'Ujjal';
        $user->last_name = 'Ujjal';
        $user->email = 'ujjalkumar1993@yahoo.com';
        $user->password = bcrypt('123456');
        $user->date_of_birth = '1993-10-25';
        $user->country_id = 76;
        $user->contact_number = 9674768037;
        $user->profile_picture = 'ujjalpic.jpg';
        $user->save();

    }
}

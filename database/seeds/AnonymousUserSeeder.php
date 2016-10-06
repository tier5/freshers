<?php

use Illuminate\Database\Seeder;
use App\User;

class AnonymousUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->id=0;
        $user->first_name='Anonymous';
        $user->last_name='User';
        $user->email='anonymous@anonymous.anonymous';
        $user->password='Aa123456';
        $user->save();
    }
}

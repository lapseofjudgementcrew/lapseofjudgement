<?php
use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        $users = ['Momentary','Canisar','Jadeboo','Jdonofs','Togz','Assimilation','Bowditchi','Jcmorgan','Jeoardize','Ruimiguel','Barbaryi','Carpenters','Gustavinho','Horsehead','Jmikael','Arthras','Isaacfawks','Scodan','Valencsia','Hellangel','Jyce','Quetzalisle','Ranchell','Theemokiller'];
        foreach ($users as $user){
        	User::create(array(
        		'yppname'=> $user,
        		'code' => str_random(60)
        	));

        }
        	
    }
}
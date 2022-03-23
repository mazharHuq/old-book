<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(User::where('email', 'Jony@gmail.com')->first())) {
            $user = new User();
            $user->name = "Test User";
            $user->email = "jony123@gmail.com";
            $user->password = Hash::make('jony123');
            $user->save();
        }
        if (is_null(User::where('email', 'Jony@gmail.com')->first())) {
            $user = new User();
            $user->name = "MR kashem Bin Qureshi";
            $user->email = "jony12@gmail.com";
            $user->password = Hash::make('jony123');
            $user->save();
        }
        for ($i=0;$i<10;$i++){
            $faker=Faker\Factory::create();
            $user=new User();
            $user->name=$faker->name;
            $user->phone=$faker->phoneNumber;
            $user->email=$faker->safeEmail();
            $user->password=Hash::make('jony123');
            $user->save();


        }
    }
}

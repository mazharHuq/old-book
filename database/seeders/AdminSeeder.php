<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Admin::where('email', 'super@admin.com')->first())) {
            $admin = new Admin();
            $admin->name = "Super Admin";
            $admin->email = "super@admin.com";
            $admin->username = "superadmin";
            $admin->phone = "01711223344";
            $admin->password = Hash::make('12345678');
            $admin->save();
            $admin->assignRole('god');
        }
    }
}

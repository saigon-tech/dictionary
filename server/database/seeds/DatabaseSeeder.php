<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_admin')->insert([
            'admin_email'   => 'admin.sgt@gmail.com',
            'password'      => Hash::make('123456'),
            'admin_name'    => 'admin',
            'admin_phone'   => '099999999',
            'created_at'    => date('yy/m/d h:i:s'),
            'updated_at'    => null,
        ]);
    }
}

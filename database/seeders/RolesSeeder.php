<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_slug = 'admin_'.random_int(10000000, 99999999);
        $vendor_slug = 'vender_'.random_int(10000000, 99999999);
  
        $role = [
            [
                'title'=>'Admin',
                'slug'=>$admin_slug,
                'is_admin'=>'1',
            ],
            [
                'title'=>'Vendor',
                'slug'=>$vendor_slug,
                'is_admin'=>'0',
            ],
        ];
  
        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}

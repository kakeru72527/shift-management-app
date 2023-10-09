<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_ids = [
            5,5,6,6,7,7,8,8,9,9
        ];

        $store_ids = [
            5,6,5,6,5,6,5,6,5,6
        ];

        $roles = [
            'parttime', 'admin',
            'admin', 'employee',
            'parttime', 'parttime',
            'employee', 'parttime',
            'employee', 'parttime'
        ];

        foreach(array_map(null, $user_ids, $store_ids, $roles) as [$user_id, $store_id, $role]){
            Staff::create([
                'user_id' => $user_id,
                'store_id' => $store_id,
                'role' => $role
            ]);
        }

    }
}

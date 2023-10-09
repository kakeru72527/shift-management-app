<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RequestShift;

class RequestShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff_ids_for_five = [
            19,21,23
        ];

        $store_id_for_five = 5;

        $date = '2023-11-01';

        $start_times_for_five = [
            '12:00:00', '13:00:00', '16:00:00'
        ];

        $end_times_for_five = [
            '19:00:00', '20:00:00', '22:00:00'
        ];

        foreach(array_map(null, $staff_ids_for_five, $start_times_for_five,$end_times_for_five) as [$i, $s, $e]){
            RequestShift::create([
                'staff_id' => $i,
                'store_id' => $store_id_for_five,
                'date' => $date,
                'start_time' => $s,
                'end_time' => $e
            ]);
        }

        $staff_ids_for_six = [
            18,22,24
        ];

        $store_id_for_six = 6;

        foreach(array_map(null, $staff_ids_for_six, $start_times_for_five,$end_times_for_five) as [$i, $s, $e]){
            RequestShift::create([
                'staff_id' => $i,
                'store_id' => $store_id_for_six,
                'date' => $date,
                'start_time' => $s,
                'end_time' => $e
            ]);
        }








    }
}

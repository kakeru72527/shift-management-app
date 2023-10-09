<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $names = [
            'セブンイレブン 難波店', 'ローソン 梅田店'
        ];

        $address = [
            '大阪府大阪市xxoo', '大阪府大阪市ooxx'
        ];

        $descriptions =[
            '大阪難波にあるセブンイレブンです。',
            '大阪梅田駅近くのローソンです。'
        ];

        foreach(array_map(null, $names, $address, $descriptions) as [$name, $jusho, $description]){
            Store::create([
                'name' => $name,
                'address' => $jusho,
                'description' => $description
            ]);
        }


    }
}

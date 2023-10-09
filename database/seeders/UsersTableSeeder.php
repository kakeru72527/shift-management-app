<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $names = [
            'テストユーザー', '田中太郎', '山田健人', '鈴木康太', '松本勇気'
        ];

        $emails = [
            'test@example.com', 'tanakataro@example.com',
            'yamadakento@example.com', 'suzukikouta@example.com',
            'matsumotoyuki@example.com'
        ];

        $passwords = [
            'test', 'tanakataro',
            'yamadakento', 'suzukikouta',
            'matsumotoyuki'
        ];

        foreach(array_map(null, $names, $emails, $passwords) as [$name, $email, $password]){
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
        }

    }
}

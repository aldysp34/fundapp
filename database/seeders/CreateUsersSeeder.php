<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ketua Bidang',
                'email' => 'ketuabidang@peparda.bekasi',
                'user_access' => 0,
                'bidang_id' => 1,
                'password' => bcrypt('ketuabidang')
            ],
            [
                'name' => 'Verifikator',
                'email' => 'verifikator@peparda.bekasi',
                'user_access' => 1,
                'password' => bcrypt('verifikator')
            ],
            [
                'name' => 'Bendahara',
                'email' => 'bendahara@peparda.bekasi',
                'user_access' => 2,
                'password' => bcrypt('bendahara')
            ],
            [
                'name' => 'Ketua Harian',
                'email' => 'ketuaharian@peparda.bekasi',
                'user_access' => 3,
                'password' => bcrypt('ketuaharian')
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@peperda.bekasi',
                'user_access' => 4,
                'password' => bcrypt('admin')
            ]
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

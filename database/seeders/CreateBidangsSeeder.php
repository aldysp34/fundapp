<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;

class CreateBidangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bidang = [
            ['name' => 'Hukum'],
            ['name' => 'Kesekertariatan']
        ];

        foreach($bidang as $x => $y){
            Bidang::create($y);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proposal;

class CreateProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id_transaksi' => '0001',
            'bidang_id' => 1,
            'deskripsi' => 'Ini contoh Proposal',
            'jumlah_diajukan' => 1000,
            'status' => 1,
            'verifikator_approved' => 0,
            'alasan_verifikator' => 'hahaha',
            'ketuaharian_approved' => 0,
            'alasan_ketuaharian' => 'hahaha',
            'termin' => 1
        ];

        Proposal::create($data);
    }
}

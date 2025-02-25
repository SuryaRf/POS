<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'KC',
                'kategori_nama' => 'Kecantikan'
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KS',
                'kategori_nama' => 'Kesehatan'
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'BY',
                'kategori_nama' => 'Bayi'
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'MK',
                'kategori_nama' => 'Makanan'
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'MN',
                'kategori_nama' => 'Minuman'
            ],
            ];
            DB::table('m_kategoris')->insert($data);
    }
}

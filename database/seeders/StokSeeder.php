<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'user_id' => 1, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 100
            ],
            [
                'barang_id' => 2,
                'user_id' => 1, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 150
            ],
            [
                'barang_id' => 3,
                'user_id' => 2, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 200
            ],
            [
                'barang_id' => 4,
                'user_id' => 2, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 120
            ],
            [
                'barang_id' => 5,
                'user_id' => 3, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 80
            ],
            [
                'barang_id' => 6,
                'user_id' => 3, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 90
            ],
            [
                'barang_id' => 7,
                'user_id' => 1, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 110
            ],
            [
                'barang_id' => 8,
                'user_id' => 2, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 130
            ],
            [
                'barang_id' => 9,
                'user_id' => 3, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 160
            ],
            [
                'barang_id' => 10,
                'user_id' => 1, // Ganti dengan user_id yang valid
                'stok_tanggal' => now(),
                'stok_jumlah' => 180
            ],
        ];

        DB::table('t_stoks')->insert($data);
    }
}

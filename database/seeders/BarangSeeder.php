<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Sunscreen',
                'harga_beli' => 50000,
                'harga_jual' => 60000
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Serum',
                'harga_beli' => 17000,
                'harga_jual' => 20000
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Lipstik',
                'harga_beli' => 35000,
                'harga_jual' => 40000
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Bedak',
                'harga_beli' => 25000,
                'harga_jual' => 30000
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Sabun Mandi',
                'harga_beli' => 10000,
                'harga_jual' => 12000
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Shampoo',
                'harga_beli' => 15000,
                'harga_jual' => 18000
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Sikat Gigi',
                'harga_beli' => 8000,
                'harga_jual' => 10000
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Pasta Gigi',
                'harga_beli' => 7000,
                'harga_jual' => 9000
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Handuk',
                'harga_beli' => 20000,
                'harga_jual' => 25000
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Sisir',
                'harga_beli' => 5000,
                'harga_jual' => 7000
            ],
            
            ];
            DB::table('m_barangs')->insert($data);
    }
}

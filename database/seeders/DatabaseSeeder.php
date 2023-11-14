<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Dummy admin
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => bcrypt('jogmatis'), 'email' => 'admin@admin.com']
        ]);

        DB::table('anggota')->insert([
            [
                'id_lokal' => '#123',
                'nama' => 'Turasno',
                'kode_reg' => 'REG111',
                'tempat_lahir' => 'Gunung Kidul',
                'tgl_lahir' => '1984-10-28',
                'no_hp' => '0812345678',
                'alamat' => 'Gunung Kidul',
                'kendaraan_jenis' => 'Kijang',
                'kendaraan_warna' => 'Biru',
                'kendaraan_nopol' => 'AB 1234 CD',
                'kendaraan_tahun' => '2017',
                'tgl_reg_tksci' => '2022-02-02',
            ]
        ]);
    }
}

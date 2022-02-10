<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengeluaran;
use App\Models\Total;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Pengeluaran::create([
            'nama_kegiatan' => 'Gajian',
            'jenis_kegiatan' => 'Kredit',
            'debit' => '50000'
        ]);

        Pengeluaran::create([
            'nama_kegiatan' => 'Hasil Website SDN 028 Tenggarong Seberang',
            'jenis_kegiatan' => 'Kredit',
            'debit' => '1000000'
        ]);

        Total::create([
            'total' => '1500000'
        ]);
    }
}

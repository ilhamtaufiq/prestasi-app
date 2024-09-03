<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'mapel' => 'Pendidikan Agama dan Budi Pekerti',
            ],
            [
                'mapel' => 'PKN',
            ],
            [
                'mapel' => 'Matematik',
            ],
            [
                'mapel' => 'IPA',
            ],
            [
                'mapel' => 'IPS',
            ],
            [
                'mapel' => 'PJOK',
            ],
            [
                'mapel' => 'Seni Budaya',
            ],
            [
                'mapel' => 'Basa Sunda',
            ],
            [
                'mapel' => 'Bahasa Inggris',
            ],

        ];

        foreach ($data as $item) {
            $mapel = MataPelajaran::create([
                'nama_mapel' => $item['mapel'],
            ]);

        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriterias')->insert(
            [
                //PAI
                [
                    'nilai_pengetahuan' => '',
                    'nilai_keterampilan' => '',
                ],
                //PKN
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //B.INDONESIA
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //MTK
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //IPA
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //IPS
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //PJOK
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //SENBUD
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //BASA SUNDA
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
                //B.INGGRIS
                [
                    'nilai_pengetahuan' => ' ',
                    'nilai_keterampilan' => ' ',
                ],
            ]
        );
    }
}

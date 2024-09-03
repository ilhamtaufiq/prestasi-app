<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KepsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'KepalaSekolah',
            'guard_name' => 'web'
        ]);
        
        $data = [
            [
                'email' => 'liaNurzakiyah@gmail.com',
                'password' => Hash::make('Password2024'),
                'nip' => '197907032007012005',
                'nama_guru' => 'Lia Nurzakiyah, S.Pd',
                'jabatan' => 'Kepala Sekolah',
                'jenis_kelamin' =>'P',
            ],
        ];

        foreach ($data as $item) {
            $user = User::create([
                'name' => $item['nama_guru'],
                'email' => $item['email'],
                'password' => $item['password'],
            ]);
            
            DB::table('wali_kelass')->insert([
                [
                    'nip' => $item['nip'],
                    'nama_guru' => $item['nama_guru'],
                    'jabatan' => $item['jabatan'],
                    'jenis_kelamin' => $item['jenis_kelamin'],
                    'id_user' => $user->id,
                ],
            ]);

            $user->assignRole('KepalaSekolah');
        }
    }
}

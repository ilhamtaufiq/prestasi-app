<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'WaliKelas','guard_name' => 'web',]);
                $data = [
                    [
                        'email' => 'rini@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '0958765667300023',
                        'nama_guru' => 'Rini Nurhayati, S.Pd.I',
                        'jabatan' => 'Wali Kelas 1',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'email' => 'erlin@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '1035754658360003',
                        'nama_guru' => 'Erlin Ratnawati, S.Pd',
                        'jabatan' => 'Wali Kelas 2',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'email' => 'robiah@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '196404101984102001',
                        'nama_guru' => 'Robiah, S.Pd',
                        'jabatan' => 'Wali Kelas 3',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'email' => 'aiSulasmi@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '5140766667230373',
                        'nama_guru' => 'Ai Sulasmi, S.Pd',
                        'jabatan' => 'Wali Kelas 4',
                        'jenis_kelamin' =>'P',
                    ],
                    [
                        'email' => 'rusman@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '-',
                        'nama_guru' => 'Rusman Efendi, S.Pd',
                        'jabatan' => 'Wali Kelas 5',
                        'jenis_kelamin' =>'L',
                    ],
                    [
                        'email' => 'enden@gmail.com',
                        'password' => Hash::make('Password2024'),
                        'nip' => '4955766668200002',
                        'nama_guru' => 'Enden Sirojudin, S.Pd',
                        'jabatan' => 'Wali Kelas 6',
                        'jenis_kelamin' =>'L',
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
        
                    $user->assignRole('WaliKelas');
                }
    }
}

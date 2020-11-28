<?php

use App\Models\model_user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds= [
            [
                'id_kota' => 41,
                'username' => 'michaeltenoyo',
                'password' => Hash::make('michaeltenoyo'),
                'nama' => 'Michael Tenoyo',
                'email' => 'michaeltenoyo@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'seller',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Selatan VI/11'
            ],

            [
                'id_kota' => 13,
                'username' => 'stefanocalvin',
                'password' => Hash::make('stefanocalvin'),
                'nama' => 'Stefano Calvin',
                'email' => 'stefanocalvin@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'seller',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Timur VI/11'
            ],

            [
                'id_kota' => 23,
                'username' => 'stevenwang',
                'password' => Hash::make('stevenwang'),
                'nama' => 'Steven Wang',
                'email' => 'stevenwang@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'customer',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Timur VI/11'
            ],

            [
                'id_kota' => 33,
                'username' => 'samuelchristian',
                'password' => Hash::make('samuelchristian'),
                'nama' => 'Samuel Christian',
                'email' => 'samuelchristian@gmail.com',
                'status_verifikasi' => 1,
                'jenis_user' => 'customer',
                'status_ban' => 0,
                'alamat_user' => 'Desa Api Barat VI/11'
            ],
        ];

        foreach ($seeds  as $key => $seed) {
            model_user::create($seed);
        }
    }
}

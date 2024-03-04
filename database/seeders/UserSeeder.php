<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $user = [
        [
          'name' => 'user admin',
          'email' => 'admin@rsudw.com',
          'password' => bcrypt('123456'),
          'role' => 'admin'
        ],
        [
          'name' => 'user pegawai',
          'email' => 'pegawai@rsudw.com',
          'password' => bcrypt('123456'),
          'role' => 'pegawai'
        ]
      ];
      foreach ($user as $key => $value) {
        User::create($value);
      }
    }
}

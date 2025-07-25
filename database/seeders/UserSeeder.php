<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str; // Tambahkan ini untuk menggunakan Str::ulid()

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_id' => (string) Str::ulid(), // Menggunakan Str::ulid() untuk ULID
            'name' => 'LutfiA',
            'email' => 'LutfiA@gmail.com',
            'password' => bcrypt('123'), // Kata sandi di-hash
            'membership_date' => now()->toDateString(), // Tanggal keanggotaan hari ini
            'remember_token' => Str::random(10),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Kontak;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'owner' => true,
        ]);

        Kontak::factory()->create([
            'nomor_telepon' => '081234567890',
            'instagram' => '',
            'facebook' => '',
            'tiktok' => '',
            'id_user' => 1,
        ]);
    }
}

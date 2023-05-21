<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Alandrian Surya Tantra',
            'email' => 'alandriansuryatantra@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Barang::create([
            'nama_barang' => 'AIR JORDAN 1 HIGH CHICAGO LOST AND FOUND',
            'harga' => 200000,
            'stok' => 100,
            'category' => 'Sepatu',
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat quasi facilis nihil reiciendis quae natus cumque delectus ipsa magnam?'
        ]);
        Barang::create([
            'nama_barang' => 'AIR JORDAN 1 HIGH TRAVIS SCOTT',
            'harga' => 100000,
            'stok' => 80,
            'category' => 'Sepatu',
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat quasi facilis nihil reiciendis quae natus cumque delectus ipsa magnam?'
        ]);
        Barang::create([
            'nama_barang' => 'Topi Distro',
            'harga' => 75000,
            'stok' => 80,
            'category' => 'Topi',
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat quasi facilis nihil reiciendis quae natus cumque delectus ipsa magnam?'
        ]);
        Barang::create([
            'nama_barang' => 'AIR JORDAN 1 LOW FRAGMENT X TRAVIS SCOTT',
            'harga' => 90000,
            'stok' => 80,
            'category' => 'Sepatu',
            'keterangan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quaerat quasi facilis nihil reiciendis quae natus cumque delectus ipsa magnam?'
        ]);
    }
}

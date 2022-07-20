<?php

namespace Database\Seeders;

use App\Models\categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = new User();
        $data->name = 'adm';
        $data->email = 'adm@example.com';
        $data->password = Hash::make('adc0478');
        $data->save();
        
        $category = new categorias();
        $category->detalle ="Desarrollo";
        $category->save();
        $category2 = new categorias();
        $category2->detalle ="Diseño";
        $category2->save();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

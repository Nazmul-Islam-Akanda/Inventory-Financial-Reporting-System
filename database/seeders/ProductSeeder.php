<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Ajwa Premium',
            'purchase_price' => 100.00,
            'sell_price' => 200.00,
            'opening_stock' => 50,
            'current_stock' => 50,
        ]);
    }
}

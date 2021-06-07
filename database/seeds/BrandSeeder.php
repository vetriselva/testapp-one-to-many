<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(["brand_name" => "Samsung", "slug" => "samsung"]);
        Brand::create(["brand_name" => "Motorala", "slug" => "motorala"]);
        Brand::create(["brand_name" => "Panasonic", "slug" => "Panasonic"]);
    }
}

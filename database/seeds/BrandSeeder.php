<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $brand = new \App\Brand;
        // $brand->brand_name = "XYZ";
        // $brand->slug = "xyz";
        // $brand->save();
        factory(App\Brand::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $brand = new \App\Satuan;
        // $brand->satuan_name = "kg";
        // $brand->slug = "kg";
        // $brand->save();
        factory(App\Satuan::class, 5)->create();
    }
}

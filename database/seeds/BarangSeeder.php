<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = new \App\Barang;
        $barang->part_number = 12345;
        $barang->description = "Loremipsum doler si amet";
        $barang->category_id = 1;
        $barang->brand_id = 1;
        $barang->satuan_id = 1;
        $barang->price = "12000";
        $barang->cover = "cover.jpg";
        $barang->stok = 0;
        $barang->save();
    }
}

<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $category = new \App\Category;
        // $category->category_name = "Tangga";
        // $category->slug = "tangga";
        // $category->save();
        factory(App\Category::class, 30)->create();
    }
}

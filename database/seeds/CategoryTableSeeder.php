<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Technology';
        $category->save();

        $category = new Category();
        $category->name = 'Sports';
        $category->save();

        $category = new Category();
        $category->name = 'Entertainment';
        $category->save();

        $category = new Category();
        $category->name = 'Lifestyle';
        $category->save();
    }
}

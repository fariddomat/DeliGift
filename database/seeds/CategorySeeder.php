<?php

use App\Category;
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
        $categories=['souvenirs', 'accessories', 'food', 'colthes', 'furniture', 'books'];
        foreach ($categories as $key => $value) {
            Category::create([
                'name'=>$value
            ]);
        }
    }
}

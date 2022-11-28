<?php

use App\Gift;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Faker\Generator as Faker;
class GiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 36; $i++) {
            $x=($i%6) +1;
            $x2=$x;
            Gift::create([
            'name'=>Str::random(10),
            'details'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'tags'=>'New',
            'price'=>'99',
            'rating'=>4,
            'source'=>'Store '.$x,
            'img'=>$x2.'.jpg',
            'category_id'=>$x
        ]);

        }

    }
}

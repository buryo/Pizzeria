<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'images/pizza/sate-pizza.png',
            'title' => 'Pizza Quattro formagie',
            'description' => 'Super cool - at least as a child',
            'price' => 9.95
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'images/pizza/sate-pizza.png',
            'title' => 'Pizza Tonno',
            'description' => 'Pizza Tonno description',
            'price' => 8.95
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'images/pizza/sate-pizza.png',
            'title' => 'Pizza Salami',
            'description' => 'Pizza Salami description',
            'price' => 9.95
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'images/pizza/sate-pizza.png',
            'title' => 'Pizza kipsate',
            'description' => 'Pizza kipsate description',
            'price' => 11.95
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'images/pizza/sate-pizza.png',
            'title' => 'Pizza Condolina',
            'description' => 'Pizza Condolina description',
            'price' => 9.95
        ]);
        $product->save();
    }
}

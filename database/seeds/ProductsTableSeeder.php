<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	$product1 = Product::create([
			'title'  => 'Blue Blockout Curtain',
			'description' => 'Blockout curtain lining that is easy to attach.',
			'category' => 'Curtains',
			'price' => 829.99
		]);
		$product2 = Product::create([
			'title'  => 'Anna Curtain',
			'description' => 'A woven patterned curtain, fully lined, with eyelets',
			'category' => 'Curtains',
			'price' => 699.99
		]);
		$product3 = Product::create([
			'title'  => 'Cotton Percale Duvet Cover Set ',
			'description' => 'Soft and luxurious 200 thread count cotton percale',
			'category' => 'Duvet Covers',
			'price' => 629.99
		]);
		$product4 = Product::create([
			'title'  => 'Quilted Mattress Protector ',
			'description' => 'Adds extra comfort to your mattress as well as protection against dirt & stain',
			'category' => 'Bedding',
			'price' => 249.99
		]);
		$product4 = Product::create([
			'title'  => 'Tencel Duvet Inner',
			'description' => 'A medium warmth inner with microfibre fill and 100% down proof cotton casing',
			'category' => 'Bedding',
			'price' => 549.99
		]);
	}
}

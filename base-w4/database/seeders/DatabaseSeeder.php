<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Container::getInstance()->make(Generator::class);

        $users = \App\Models\Users::factory(5)->create();
        $products = \App\Models\Products::factory(20)->create();

        $users->each(function($user) use ($faker, $products){

           for($j=0;$j<2;$j++){
               $n =  rand(1 , 100);
               $item_count = 0;
               $items = Array();
               $pLen = count($products);

               for($i=0;$i<$n;$i++){
                   $pos = rand(0, $pLen - 1);
                   $product = $products[$pos];

                   $idx = array_key_exists($product['title'], $items);

                   if($idx){
                       $items[$product['title']] = Array('item' => $product, 'amount' => $items[$product['title']]['amount'] + 1);
                   } else {
                       $items[$product['title']] = Array('item' => $product, 'amount' => 1);
                   }
               }

               $subtotal = 0.0;
               $shipping = 0.0;
               $grand_total = 0.0;
               $total = 0;

               foreach($items as $o){
                   $item = $o['item'];
                   $amount = $o['amount'];
                   $subtotal = $subtotal + $item['unit_price'] * $amount;
                   $item_total = $amount * $item['unit_price'];

                   if($item['type'] == 'regular'){
                       $shipping = 3.99;
                   }
               }

               $total = $subtotal + $shipping;
               $taxes = $total * 0.10;
               $grand_total = $total + $taxes;

               $order = \App\Models\Orders::factory(1)->create([
                   'user_id' => $user['id'],
                   'item_count' => $n,
                   'sub_total' => $subtotal,
                   'shipping' => $shipping,
                   'taxes' => $taxes,
                   'grand_total' => $grand_total,
                   'placed_at' => now()
               ])[0];

               foreach($items as $o){
                   $item = $o['item'];
                   $amount = $o['amount'];
                   $item_total = $amount * $item['unit_price'];

                   \App\Models\Line_items::factory(1)->create([
                       'order_id' => $order['id'],
                       'product_id' => $item['id'],
                       'unit_price' => $item['unit_price'],
                       'quantity' => $amount,
                       'item_total' => $item_total
                   ]);
               }
           }
        });
    }
}

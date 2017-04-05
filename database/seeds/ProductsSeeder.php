<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $products=array(
            ['id'=>1, 'pname'=> 'iPhone', 'quantity'=>87, 'price'=>499.99, 'created_at'=> new DateTime, 'updated_at'=> new DateTime],
            ['id'=>2, 'pname'=> 'iPad', 'quantity'=>24, 'price'=>299.99, 'created_at'=> new DateTime, 'updated_at'=> new DateTime],
            ['id'=>3, 'pname'=> 'Mac','quantity'=>50, 'price'=>999.99, 'created_at'=> new DateTime, 'updated_at'=> new DateTime],
        );
        
        DB::table('products')->insert($products);
    }
}

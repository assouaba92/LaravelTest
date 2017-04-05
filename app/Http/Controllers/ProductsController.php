<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products=Product::all();
        $valueSum=0;
        foreach($products as $product){
         $valueSum+= $product->price*$product->quantity;  
        }
        return view('products.index', compact('products', 'valueSum'));
    }
    
    public function store(Request $request) 
    {
        $product = new Product;
        $product->pname = $request->productName;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        
        $productJSON = json_encode($product);
        
        $jsonfile = 'products.json';
        $current = file_get_contents($jsonfile);
        $current .= ','.$productJSON;
        file_put_contents($jsonfile, $current);
        
        return redirect('products');
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->pname = $request->newName;
        $product->quantity = $request->newQuantity;
        $product->price = $request->newPrice;
        $product->update();
        
        return redirect('products');   
    }
    
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('products');
    }
}

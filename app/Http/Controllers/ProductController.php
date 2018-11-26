<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function show(Product $product)
    {
        return response()->json($product);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        $product = new Product([
            'title'        => $request->title,
            'description' => $request->description,
            'category'        => $request->category,
            'price' => $request->price
        ]);
        if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(100, 100)->save( public_path('/storage/' . $filename ) );
          $product->image = $filename;
        }
        $product->save();
         return response()->json([
            'product'    => $product,
            'message' => 'Success'
        ], 200);
    }
    public function update(Request $request, Product $product)
    {
         $this->validate($request, [
            'title'        => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|numeric'
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(200, 200)->save( public_path('/storage/' . $filename ) );
          $product->image = $filename;
        }
        $product->save();
        return response()->json([
            'message' => 'Product updated successfully!'
        ], 200);
    }
    public function delete(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully!'
        ], 200);
    }
}

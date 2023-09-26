<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  ProductResource::collection(Product::all()->sortByDesc('created_at'));
        $categories = Category::all();
        return response()->json(['products' => $products, 'categories' => $categories]);
        // return ProductResource::collection(Product::all());
    }

    public function create()
    {
        return view('admin.products.create'); // 'products.create' is the name of the Blade view
    }

    public function edit()
    {
        return view('admin.products.edit'); // 'products.create' is the name of the Blade view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $fileName = time() . 'product.' . $request->images->extension();
            // $request->images->move(public_path('images'), $fileName);
            $request->images->storeAs('public/images', $fileName); 
            $product = new Product([
                'name' => $request['name'],
                'description' => $request['description'],
                'category_id' => $request['category_id'],
                'user_id' => $request['user_id'], 
                'image' => $fileName, 
            ]);
            $product->save();
            return response()->json(['message' => 'Product Add successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to add product'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // $prod = Product::find($id);
            $product->delete();
    
            return response()->json(['message' => 'Product deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete product'], 500);
        }
        
    }
}

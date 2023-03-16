<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($category_id, $product_id)
    {
        $categories = Category::find($category_id);
        $products = Product::find($product_id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (!$categories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $categories->products()->syncWithoutDetaching($products);

        $categories = Category::with('products')->find($category_id);

        return response()->json(['data' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $product_id)
    {
        $categories = Category::find($category_id);
        $products = Product::find($product_id);

        if (!$products) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        if (!$categories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $categories->products()->detach($products);

        $categories = Category::with('products')->find($category_id);

        return response()->json(['data' => $categories]);
    }
}

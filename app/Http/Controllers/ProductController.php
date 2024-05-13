<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'ASC')->get();

        return view('manage.products.index', compact('products'));
    }

    public function create()
    {
        return view('manage.products.create');
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        Session::flash('success-message', 'Product added successfully...');
        return redirect()->route('adminproducts.create');
    }

    public function edit(Product $product)
    {
        return view('manage.products.edit', compact('product'));
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update($request->validated());

        Session::flash('success-message', 'Product updated successfully...');
        return redirect()->route('adminproducts.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        Session::flash('delete-message', 'Product deleted successfully...');
        return back();
    }
}

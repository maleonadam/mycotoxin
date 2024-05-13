<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use Cart;
use Validator;

class CartController extends Controller
{

    public function index()
    {
        return view('manage.cart.index');
    }

    public function store(int $id)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if ($duplicates->isNotEmpty()) {
            Session::flash('delete-message', 'Item already in Cart! Just increase Quantity.');
            return redirect()->route('cart.index');
        }

        $product = Product::find($id);

        Cart::add($id, $product->name, 1, $product->price, 500)->associate('App\Models\Product');

        Session::flash('success-message', 'Item added to cart successfully...');
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->prodId;

        Cart::update($id, $request->qty);

        Session::flash('success-message', 'Quantity updated successfully...');
        return back();
    }

    public function destroy($id)
    {
        Cart::remove($id);

        Session::flash('delete-message', 'Item removed successfully...');
        return back();
    }
}

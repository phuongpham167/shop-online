<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProdutcsController extends Controller
{
    public function index(){
    	$products = Product::all();
    	return view('products', compact('products'));
    }

    public function cart(){
    	return view('cart.cart');
    }

    public function addToCart($id){
    	$product = Product::find($id);

    	if (!$product) {
    		abort(404);
    	}

    	$cart = session()->get('cart');

    	//if cart is empty then this the first product
    	if (!$cart) {
    		$cart = [
    			$id => [
    				'name' => $product->name,
    				'quantity' => '1',
    				'price' => $product->unit_price,
    				'image' => $product->image
    			]
    		];

    		session()->put('cart', $cart);

    		return redirect()->back()->with('success', 'Product added to cart success');
    	}

    	//if cart is not empty check this product exitst?

    	if (isset($cart[$id])) {
    		$cart[$id]['quantity']++;
    		session()->put('cart', $cart);

    		return redirect()->back()->with('success', 'Product added to cart success');
    	}

    	$cart[$id] = [
    		'name' => $product->name,
			'quantity' => '1',
			'price' => $product->unit_price,
			'image' => $product->image
    	];
    	session()->put('cart', $cart);
    	return redirect()->back()->with('success', 'Product added to cart success');
    }

    public function update(Request $req){
    	if ($req->id and $req->quantity) {
    		$cart = session()->get('cart');
    		$cart[$req->id]['quantity'] = $req->quantity;
    		session()->put('cart', $cart);
    		session()->flash('success', 'Cart updated successully');
    	}
    }
    public function remove(Request $req){
    	if($req->id){
    		$cart = session()->get('cart');
    		if (isset($cart[$req->id])) {
    			unset($cart[$req->id]);
    			session()->put('cart', $cart);
    		}
    		session()->flash('success', 'Product removed successfully');
    	}
    }
}

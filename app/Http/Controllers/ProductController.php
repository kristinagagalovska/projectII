<?php

namespace App\Http\Controllers;


use App\Product;
use App\Services\ProductService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {

    private $products;

    public function __construct( ProductService $productService )
    {
        $this->products = $productService;
    }

    public function all() {

        $users = User::all();
        $products = $this->products->all();

        return view('products/all', compact('products', 'users'));
    }

    public function create() {

        return view('products/create');
    }

    public function store(Request $request) {

        $user = User::find(Auth::user()->id);
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;

        $this->products->add($name, $price, $description, $user->id);

        return redirect('allProducts');
    }

}
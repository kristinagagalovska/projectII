<?php

namespace App\Http\Controllers;

use App\Events\PurchasedProduct;
use App\Product;
use App\Sale;
use App\Services\SaleService;
use App\User;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class SaleController extends Controller {

    private $sales;

    public function __construct(
        SaleService $sales
    ) {
        $this->sales = $sales;
    }

    public function stripe() {

        $products = Product::all();

        return view('stripe/stripe', compact('products'));
    }

    public function store() {

        $productId = request()->get('productId');
        $sellerId = request()->get('sellerId');
        $customerId = request()->get('customerId');

        $product = Product::findOrFail($productId);
        $seller = User::find($sellerId);
        $customer = User::find($customerId);

        Stripe::setApiKey(config('services.stripe.secret'));

        $cust = Customer::create([
            'email' => request('stripeEmail'),
            'source' => request('stripeToken')
        ]);


        // Create a charge: this will charge the user's card
        Charge::create([
            'customer' => $cust->id,
            'amount' => $product->price,
            'currency' => 'usd'
        ]);

        //save data in sales table
        $this->sales->add(
            $seller->name,
            $product->name,
            $product->price,
            $customer->name,
            $cust->id,
            $sellerId,
            $customerId,
            $productId
        );

        event(new PurchasedProduct($product));


        return redirect()->route('allProducts');
    }
}
<html>
<head>
    <h2>List of book</h2>
</head>
<body>
<ul>
    @foreach($products as $product)
        <form id="checkout-form" action="{{route('purchases')}}" method="POST">

            {{ csrf_field() }}
            <li>{{$product->name}}</li>

            <input type="hidden" name="stripeToken" id="stripeToken">
            <input type="hidden" name="stripeEmail" id="stripeEmail">
            <input type="hidden" name="productId" value="{{$product->id}}">
            <input type="hidden" name="userId" value="{{Auth::user()->id}}">

            <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="{{$product->price}}"
            data-name="{{$product->name}}"
            data-description="{{$product->description}}"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-zip-code="true">
            </script>
        </form>
    @endforeach
</ul>
</body>
</html>
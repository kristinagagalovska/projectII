<html>

<head>
    <script>
        var Laracasts = {
            csrfToken: "{{ csrf_token() }}",
            stripeKey: "{{ config('services.stripe.key') }}"
        };
    </script>

</head>

<body>
<h1>List of products</h1>

<ul>
@foreach($products as $product)
    <form id="checkout-form" action="{{route('purchases')}}" method="POST">

    {{ csrf_field() }}
    <li>{{$product->name}}</li>

    <input type="hidden" name="stripeToken" id="stripeToken">
    <input type="hidden" name="stripeEmail" id="stripeEmail">

    <button type="submit">Buy My Book</button>

    {{--<script--}}
            {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
            {{--data-key="{{ config('services.stripe.key') }}"--}}
            {{--data-amount="2500"--}}
            {{--data-name="Some Book"--}}
            {{--data-description="This will give you everything you need to get started."--}}
            {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
            {{--data-locale="auto"--}}
            {{--data-zip-code="true">--}}
    {{--</script>--}}
    </form>
@endforeach
</ul>

    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>

    <script>

        let stripe = StripeCheckout.configure({

            key: "pk_test_CCl3xYvnjQpLebOTe3jKZ0Cn",
            image: "https://stripe.com/img/documentation/checkout/marketplace.png",
            locale: "auto",
            token: function(token) {
                document.querySelector('#stripeEmail').value = token.email;
                document.querySelector('#stripeToken').value = token.id;

                document.querySelector('#checkout-form').submit();
            }
        });

        document.querySelector('button').addEventListener('click', function(e) {

            stripe.open({
                name: '{{$product->name}}}',
                description: '{{$product->description}}}',
                zipCode: true,
                amout: '{{$product->price}}'

            });

            e.preventDefault();

        });

    </script>

</body>
</html>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{route('createProduct')}}">Create Product</a></div>
                    <div class="panel-body">

                        <style>
                            table, th, td {
                                border: 1px solid black;
                                border-collapse: collapse;
                            }

                            th, td {
                                padding: 5px;
                                text-align: left;
                            }
                        </style>

                        <table>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                                <th></th>
                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        @if($product->user_id != Auth::user()->id)
                                            <form id="checkout-form" action="{{route('purchases')}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="stripeToken" id="stripeToken">
                                                <input type="hidden" name="stripeEmail" id="stripeEmail">
                                                <input type="hidden" name="productId" value="{{$product->id}}">
                                                <input type="hidden" name="sellerId" value="{{$product->user_id}}">
                                                <input type="hidden" name="customerId" value="{{Auth::user()->id}}">

                                                <script
                                                        src="https://checkout.stripe.com/checkout.js"
                                                        class="stripe-button"
                                                        data-key="{{ config('services.stripe.key') }}"
                                                        data-amount="{{$product->price}}"
                                                        data-name="{{$product->name}}"
                                                        data-description="{{$product->description}}"
                                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                        data-locale="auto"
                                                        data-zip-code="true">
                                                </script>
                                            </form>
                                        @else
                                            <form method="GET" action="{{route('editCompany', $product->id)}}">
                                                <input type="hidden" name="_method" value="EDIT"/>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                <button type="submit">Edit</button>
                                            </form>
                                            <form method="POST" action="{{route('deleteCompany', $product->id)}}">
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                <button type="submit">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->user_id != Auth::user()->id)
                                            {{$users->find($product->user_id)->name}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
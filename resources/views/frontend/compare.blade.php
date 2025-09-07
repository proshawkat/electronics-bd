@extends('layouts.frontend')

@section('content')
<h1 class="title page-title"><span>Product Comparison</span></h1>

<div id="product-compare" class="container">
	<div class="row">
		<div id="content-1" class="col-sm-12">
            @if($compares->isEmpty())
                <p class="text-center">Your compare list is empty!</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="{{ $compares->count() + 1 }}"><strong>Product Details</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="compare-name">
                                <td>Product</td>
                                @foreach($compares as $product)
                                    <td>
                                        <a href="{{ url('/product/'.$product->slug) }}">
                                            <strong>{{ $product->name }}</strong>
                                        </a>
                                    </td>
                                @endforeach
                            </tr>

                            <tr class="compare-image">
                                <td>Image</td>
                                @foreach($compares as $product)
                                    <td>
                                        <img src="{{ asset('public/'.$product->first_image_url) }}" 
                                            alt="{{ $product->name }}" 
                                            class="img-thumbnail" width="90">
                                    </td>
                                @endforeach
                            </tr>

                            <tr class="compare-price">
                                <td>Price</td>
                                @foreach($compares as $product)
                                    <td>{{ number_format($product->sale_price, 2) }} ৳</td>
                                @endforeach
                            </tr>

                            <tr class="compare-model">
                                <td>Model</td>
                                @foreach($compares as $product)
                                    <td>{{ $product->model }}</td>
                                @endforeach
                            </tr>

                            <tr class="compare-availability">
                                <td>Availability</td>
                                @foreach($compares as $product)
                                    <td>{{ $product->stock_status }}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <td></td>
                                @foreach($compares as $product)
                                    <td>
                                        <div class="compare-buttons">
                                            <button class="btn btn-primary btn-cart" 
                                                    onclick="addToCart({{ $product->id }})">
                                                Add to Cart
                                            </button>
                                            <a href="{{ url('/remove-compare/'.$product->id) }}" class="btn btn-danger btn-remove">
                                                Remove
                                            </a>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif    
        </div>
	</div>
</div>

@endsection
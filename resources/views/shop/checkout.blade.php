@extends('shop.layouts.header')
@section('title')
    Checkout
@endsection
@section('content')
<div class="content-wrapper">
	<div class="container">
		<div class="row pt120">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="heading align-center mb60">
					<h4 class="h1 heading-title">E-shop</h4>
					<p class="heading-text"> <b></b>,  we ship to you now.
					</p>
				</div>
			</div>
		</div>
    </div>
    <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                @if (Cart::content()->count()>0)    
                    <div class="row">
        
                        <div class="col-lg-12">
                    <div class="order">
                        <h2 class="h1 order-title text-center">Your Order</h2>
                        <form action="#" method="post" class="cart-main">
                            <table class="shop_table cart">
                                <thead class="cart-product-wrap-title-main">
                                <tr>
                                    <th class="product-thumbnail">Product</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (Cart::content() as $content)    
                                <tr class="cart_item">
        
                                    <td class="product-thumbnail">
        
                                        <div class="cart-product__item">
                                            <div class="cart-product-content">
                                                <h5 class="cart-product-title">{{$content->name}}</h5>
                                            </div>
                                        </div>
                                    </td>
        
                                    <td class="product-quantity">
        
                                        <div class="quantity">
                                               x {{$content->qty}}
                                        </div>
        
                                    </td>
        
                                    <td class="product-subtotal">
                                        <h5 class="total amount">${{$content->total}}</h5>
                                    </td>
        
                                </tr>
                                @endforeach
                                
        
                                <tr class="cart_item subtotal">
        
                                    {{-- <td class="product-thumbnail">
        
        
                                        <div class="cart-product-content">
                                            <h5 class="cart-product-title">	Subtotal:</h5>
                                        </div>
        
        
                                    </td>
        
                                    <td class="product-quantity">
        
                                    </td> --}}
        
                                    {{-- <td class="product-subtotal">
                                        <h5 class="total amount">${{Cart::subtotal()}}</h5>
                                    </td> --}}
                                </tr>
        
                                <tr class="cart_item total">
        
                                    <td class="product-thumbnail">
        
        
                                        <div class="cart-product-content">
                                            <h5 class="cart-product-title">Total:</h5>
                                        </div>
        
        
                                    </td>
        
                                    <td class="product-quantity">
        
                                    </td>
        
                                    <td class="product-subtotal">
                                        <h5 class="total amount">${{number_format(Cart::subtotal())}}</h5>
                                    </td>
                                </tr>
        
                                </tbody>
                            </table>
        
                            <div class="cheque">
        
                                <div class="logos">
                                    <a href="#" class="logos-item">
                                        <img src="{{asset('img/visa.png')}}" alt="Visa">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{asset('img/mastercard.png')}}" alt="MasterCard">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{asset('img/discover.png')}}" alt="DISCOVER">
                                    </a>
                                    <a href="#" class="logos-item">
                                        <img src="{{asset('img/amex.png')}}" alt="Amex">
                                    </a>
                                    
                                    <span style="float: right;">
                                        <form action="{{ route('cart.checkout')}}" method="POST">
                                            @csrf
                                              <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="pk_test_34RmVhfJpvCotGlZ4pdR6e6r005W1VgOH5"
                                                data-amount=" {{ Cart::total() * 100}}"
                                                data-name="E-shop"
                                                data-description="Buy & Pay your products online"
                                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                data-locale="auto"
                                                data-zip-code="true">
                                              </script>
                                        </form>
                                    </span>
                                </div>
                            </div>
        
                        </form>
                    </div>
                </div>
        
                    </div>
                </div>
                @else
                <div class="text-danger align-center">
                    <h2>Sorry!! cart is empty</h2>
                </div>
                @endif
            </div>
        </div>
        
        <!-- End Books products grid -->
        
        
        
        </div>
@endsection
@extends('shop.layouts.header')
@section('content')
<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">E-shop</h4>
                    <p class="heading-text">Buy products, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    <div class="container">
            <video autoplay muted loop id="myVideo">
                    <source src="{{asset('img\river.mp4')}}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{asset('storage/'.$product->display_image)}}" alt="product">

                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>

                            <div class="books-item-info">
                                <span class="books-title bold"><h6><a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a></h6></span>

                                <div class="books-price">USD ${{ $product->price }}</div>
                            </div>

                            <a href="{{ route('rapid.add',$product->id)}}" class="btn btn-small btn--dark add">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row pb120">
                <div class="col-lg-12">{{ $products->links() }}</div>
                <div class="col-lg-12">



                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('video')

@endsection
<style type="text/css">
    #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  left:0;
  min-width: 100%;
  min-height: 100%;
  z-index: -100
 }
</style>

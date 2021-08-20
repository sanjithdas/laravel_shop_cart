@extends('shop.layouts.header')
@section('title')
    E-Shop
@endsection
@section('content')
<main class="main-content">

    <section class="section bg-gray">
      <div class="container">
        <div class="row gap-y">
          @if ($products->count()>0)
          @foreach($products as $product)
          <div class="col-md-6 col-xl-4">
            <div class="product-3 mb-3">
              <a class="product-media" href="item.html">
                <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                <a href="{{route('product.show', $product->id)}}">
                   <img src="{{asset('storage/'.$product->display_image)}}" alt="product" with="400" height="400">
                </a>   
              </a>

              <div class="product-detail">
                <h6><a href="{{route('product.show', $product->id)}}">{{ $product->name }}</a></h6>
                <div class="product-price">${{ $product->price}} USD</div>
               
                <a href="19_cart.html" class="btn btn-cart btn-small btn-dark ">
                  <span class="text">Add to Cart</span>
                  <i class="seoicon-commerce"></i>
                </a>
              </div>
              <div class="align-self-center">
                
              </div>
            </div>
          </div>
          @endforeach
          
          @endif
      </div>
      {{ $products->links()}}
    </section>
   
  </main>

@endsection


@section('footer')
    @include('shop.layouts.footer')
@endsection

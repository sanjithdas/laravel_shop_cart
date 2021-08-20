@extends('layouts.app')

@section('content')
   <div class="card card-default">

       <div class="card-header">
        {{ isset($product)? 'Edit Product' : 'Add Product' }}
       </div>
       <div class="card-body">
           @include('partials.errors')
           <form action="{{isset($product)? route('product.update',[$product->id]) :route('products.store')}}" method="post" enctype="multipart/form-data">@csrf

                @if (isset($product))
                   {{-- @method('PUT')--}}
                @endif
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" name="name" value="{{ isset($product)? $product->name:''}}" id="title" class="form-control" placeholder="Name" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="title">Price</label>
                    <input type="text" name="price" value="{{ isset($product)? $product->price:''}}" id="title" class="form-control" placeholder="Price" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="title">Quantity</label>
                    <input type="quantity" name="quantity_in_stock" value="{{ isset($product)? $product->quantity_in_stock:''}}" id="title" class="form-control" placeholder="Quantity in stock" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="title">Order Quantity</label>
                    <input type="text" name="quantity_in_order" value="{{ isset($product)? $product->quantity_in_order:''}}" id="title" class="form-control" placeholder="Quantity in order" aria-describedby="helpId">
                  </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    {{-- <textarea name="description"  id="description" class="form-control" rows="5" placeholder="Description"> {{ isset($post)? $post->description:''}}</textarea> --}}
                    <input id="description" type="hidden" name="description" value="{{ isset($product)? $product->description:'' }}">
                    <trix-editor input="description"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control"  aria-describedby="helpId"  >
                    @if (isset($product))
                        <img src = "{{asset('storage/'.$product->display_image)}}"  class="img-thumbnail">
                    @endif

                </div>

                <div class="form-group">
                  <button class="btn btn-success" type="submit">{{ isset($product)? 'Update Post' : 'Create Post' }}</button>
                </div>
            </form>
       </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true,
            enableSeconds: true
        })

        $(document).ready(function() {
        $('.tags-selector').select2();
});

    </script>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection

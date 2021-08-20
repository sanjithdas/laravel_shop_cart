@extends('layouts.blog')
@section('title')
    Blog
@endsection
@section('header')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
        <div class="container">
            <div class="row">
            <div class="col-md-8 mx-auto" style="margin-top:80px;">

                <h1>Latest Blog Posts</h1>
                <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

            </div>
            </div>

        </div>
    </header><!-- /.header -->
@endsection
@section('content')
    <!-- Main Content -->
    <main class="main-content" style="margin-top:180px;">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">

                  {{-- <div class="post-thumb">
                      <img src="{{asset('storage/posts/1.jpg') }}" alt="seo">
                      <div class="overlay"></div>
                      <a href="{{asset('storage/posts/2.jpg') }}" class="link-image js-zoom-image">
                          <i class="seoicon-zoom"></i>
                      </a>
                      <a href="#" class="link-post">
                          <i class="seoicon-link-bold"></i>
                      </a>
                  </div> --}}
                @forelse ($posts as $post)
                    <div class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                      <div class="case-item  case-item__thumb">
                      <a href="{{route('post.show',$post->id)}}"><img  class="card-img-top" src="{{asset('storage/'.$post->image) }}"  alt="{{ $post->title }}"></a>
                      </a>
                        <div class="p-6 text-center">
                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{route('post.show',$post->id)}}">{{ $post->category->name }}</a></p>
                        <h5 class="mb-0"><a class="text-dark" href="{{route('post.show',$post->id)}}">{{ $post->title }}</a></h5>
                        <span>
                            <i class="fa fa-user-plus"></i> {{ $post->user->name}}
                        </span>
                        <span class="ml-3">
                          <i class="fa fa-clock-o"></i>
                          <time class="published" datetime="2016-04-17 12:00:00">
                              {{$post->created_at->diffForHumans()}} &nbsp;&nbsp;
                          </time>
                        </span>
                        
                        <span>
                          <i class="fa fa-comment-o" aria-hidden="true"></i> <a href="{{route('post.show',$post->id)}}#disqus_thread"></a> 
                              {{-- {{$post->comments()->count()}}  --}}
                        </span>
                        </div>
                      </div>
                    </div>
                    </div>
                @empty
                    <div class="alert alert-primary text-center" style="margin:0 auto;">
                      Sorry!! No record found for your query<strong> {{ request()->query('search') }}. Try again.. </strong>
                    </div>
                
                @endforelse

              </div>


              {{-- <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav> --}}
              {{ $posts->appends(['search' =>request()->query('search')])->links() }}
            </div>
            @include('partials.sidebar')

          </div>
        </div>
      </div>
      
    </main>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

  <style type="text/css">
  .case-item {
    padding: 12px;
    transition: all 3s ease;
  }
  .case-item .case-item__thumb {
    
    box-shadow: 0 16px 16px -8px rgba(0, 0, 0, 0.3);
}
  </style>
@endsection




   

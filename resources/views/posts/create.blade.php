@extends('layouts.app')

@section('content')
   <div class="card card-default">

       <div class="card-header">
        {{ isset($post)? 'Edit Post' : 'Create Post' }}
       </div>
       <div class="card-body">
           @include('partials.errors')
           <form action="{{isset($post)? route('posts.update',$post->id) :route('posts.store')}}" method="post" enctype="multipart/form-data">@csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="{{ isset($post)? $post->title:''}}" id="title" class="form-control" placeholder="Title" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    {{-- <textarea name="description"  id="description" class="form-control" rows="5" placeholder="Description"> {{ isset($post)? $post->description:''}}</textarea> --}}
                    <input id="description" type="hidden" name="description" value="{{ isset($post)? $post->description:'' }}">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post)? $post->content:'' }}">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" name="published_at" value="{{ isset($post)? $post->published_at:'' }}" id="published_at" class="form-control" placeholder="Published At" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control"  aria-describedby="helpId">
                    @if (isset($post))
                        <img src = "{{asset('storage/'.$post->image)}}"  class="img-thumbnail">
                    @endif

                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control">
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (isset($post))
                                @if($category->id==$post->category_id)
                                    selected
                                @endif
                            @endif
                            >{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
                @if ($tags->count()>0)
                <div class="form-group">
                    <label for="category">Tags</label>
                    <select name="tags[]" id="tags" class="tags-selector form-control" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @if (isset($post))
                                    @if($post->hasTag($tag->id))
                                        selected
                                    @endif
                                @endif
                                >{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group">
                  <button class="btn btn-success" type="submit">{{ isset($post)? 'Update Post' : 'Create Post' }}</button>
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

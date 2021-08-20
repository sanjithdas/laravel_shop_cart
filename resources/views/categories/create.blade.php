@extends('layouts.app')

@section('content')
<div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Category' : 'Create Category' }}
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form  action="{{ isset($category)? route('categories.update',$category->id) : route('categories.store')}}" method="post">@csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name" class="">Enter category name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ isset($category)? $category->name:''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">{{ isset($category)? 'Update Category' : 'Add Category' }}</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
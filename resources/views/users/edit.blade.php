@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">My Profile</div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('users.update-profile')}}" method="post">@csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="" class="form-control" placeholder="Name" value= "{{ $user->name }}">
                    </div>
                    <div class="form-group">
                      <label for="about">About Me</label>
                        <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
                    </div>
                    <button class="btn btn-success" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('users.create')}}" class="btn btn-success float-right">Add Users</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Users  <div class="badge badge-primary">({{$users->count()}})</div></div>
        <div class="card-body">
            @if($users->count()>0)
            <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead> 
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                            <img src = "{{Gravatar::src($user->email)}}" width="50" height="50" style="border-radius: 50%" class="img-thumbnail">
                    </td>
                    <td>
                            {{ $user->name }}
                    </td>
                    <td>
                            {{ $user->email }}
                    </td>
                    <td>
                        @if (!$user->isAdmin())
                          <form action="{{ route('users.make-admin',$user->id) }}" method="post">@csrf

                            <button class="btn btn-success btn-sm" type="submit">Make Admin</button>
                         </form>  
                        @endif  
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            </table>
            
            @else
               <h3 class="text-center">No Users yet</h3>     
            @endif
        </div>
    </div>
    
@endsection


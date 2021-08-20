@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">Post</div>
        <div class="card-body">
            @if($posts->count()>0)
            <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Post by</th>
                <th>Action</th>
            </thead> 
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                            <img src = "{{asset('storage/'.$post->image)}}" width="70" height="70" style="border-radius: 50%" class="img-thumbnail">
                    </td>
                    <td>
                            {{ $post->title }}
                    </td>
                    <td>
                         <a href="{{ route('categories.edit',$post->category_id)}}" class="href">   {{ $post->category->name }}</a>
                    </td>
                    <td nowrap>
                        {{ $post->user->name }} 
                   </td>
                    @if (!$post->trashed())
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    @else
                        <td>
                            <form action="{{ route('posts.restore', $post->id) }}" method="post">@csrf
                                @method('PUT')
                                <button class="btn btn-info btn-sm" type="submit">Restore</button>
                            </form>
                        </td>
                    @endif
                    
                    <td>
                        {{-- <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE') --}}
                                    <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $post->id }})">{{ $post->trashed() ?'Delete': 'Trash'}}</button>
                            {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" class="form-group" id="deletePostsForm"> @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($post->trashed())
                                    Are you sure want to delete this Post?
                                @else
                                    Are you sure want to trash this Post?
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                                <button type="submit" class="btn btn-danger">{{ $post->trashed() ? 'Yes, Delete': 'Yes Trash it' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
            @else
               <h3 class="text-center">No Posts yet</h3>     
            @endif
        </div>
    </div>
    
@endsection

@section('scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function handleDelete(id){
            
            var form = document.getElementById('deletePostsForm');
            form.action = '/posts/' +id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Posts\EditPostRequest;
use App\Http\Requests\Posts\CreatePostRequest;

// this is the controller for the admin side...
class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('posts.index')->with('posts',Post::all());

       return view('posts.index')
           ->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // category to list in the create form post
        return view('posts.create')
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        //upload image
        $image = $request->image->store('posts','public');
        //create the post
        $post = Post::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'content'   => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'user_id' => auth()->user()->id

        ]);
        if ($request->tags){
            $post->tags()->attach($request->tags);
        }
        // flash message and redirect to user
        session()->flash('success','Post created successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {
        $data = $request->only('title','description','published_at','content');
        if ($request->hasFile('image')){
            $image = $request->image->store('posts','public');
            $post->deleteImage();
            $data['image'] = $image;
        }

        $post->update($data);
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }

        session()->flash('success','Post updated successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // soft deleting...
       $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if ($post->trashed()){
          //  Storage::delete('public/'.$post->image);
            $post->deleteImage();
            $post->forceDelete();
        }
        else
        {

            $post->delete();
        }

        session()->flash('success','Post deleted successfully');
        return redirect(route('posts.index'));
    }
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        //dd($trashed);
        return view('posts.index')->withPosts($trashed);
        //same as view('posts.index')->with('posts',$trashed)
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success','Post restored successfully');
        return redirect()->back();
    }
}

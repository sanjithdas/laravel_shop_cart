<?php

namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show(Post $post){
        return view('blogs.show')->with('post',$post);
    }
    public function category(Category $category){

         $search = request()->query('search');

         if($search){
             $posts = $category->posts()->where('title','LIKE',"%{$search}%")->paginate(3);
         }
         else{
             $posts = $category->posts()->paginate(3);
         }
        // using laravel scope here for the search query, which is defined in the post model.
        return view('blogs.category')
            ->with('category',$category)
            ->with('posts', $posts)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
                     
    }
    public function tag(Tag $tag){

        
       // dd($posts->toSql(), $posts->getBindings());  

      return view('blogs.tag')
        ->with('tag',$tag)
        ->with('categories', Category::all())
        ->with('posts',Post::searched()->paginate(4))
        ->with('tags', Tag::all());
    }



}

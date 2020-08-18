<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class PostController extends Controller
{

    public function index(){

        $posts = auth()->user()->posts()->paginate(4);
        //$posts = Post::all();

        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('blog-post', ['post' => $post]);
    }

    public function create(){

        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    public function store(){

        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,bmp,png,jpg',
            'body' =>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'La publicación se subio correctamente');

        return redirect()->route('post.index');

    }

    public function getPostImageAttribute($value){
        return asset('storage/' . $value);
     }

     public function destroy(Post $post){

        $this->authorize('update', $post);

        $post->delete();
        Session::flash('message', 'La publicacion fue eliminada exitosamente');
        return back();

     }

     public function edit(Post $post){

        //$this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
     }

     public function update(Post $post){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'mimes:jpeg,bmp,png,jpg',
            'body' =>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_ image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);
        $post->save();


        session()->flash('post-edited-message', 'Se edito correctamente');

        return redirect()->route('post.index');
     }
}

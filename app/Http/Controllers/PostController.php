<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()) {
            $posts = Post::orderBy('created_at', 'desc')
                    ->where('visible', true)
                    ->paginate(\App::environment('paginate'));            
        }
        elseif(Auth::user()->can('admin', \App\User::class)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(\App::environment('paginate'));
            }
        else {
            $posts = Post::orderBy('created_at', 'desc')
                    ->where('visible', true)
                    ->paginate(\App::environment('paginate'));    
        }
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $post = new Post;
        $post->id_user = Auth::id();
        $post->id_parent = 0;
        $post->text = $request->text;
        $post->visible = 1;
        $post->created_at = date("Y-m-d H:i:s");
        $post->updated_at = date("Y-m-d H:i:s");
        $post->save();
        return redirect('blog');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = Post::find($id);
        $post->visible = !$post->visible;
        $post->updated_at = date("Y-m-d H:i:s");
        $post->save();
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('blog');
    }
}

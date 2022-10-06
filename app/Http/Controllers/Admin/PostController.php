<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $posts = Post::orderBy('updated_at', 'DESC')->orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        return view('admin.posts.index', compact('posts', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::select('id', 'label',)->get();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'url|nullable',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ], [
            'category_id.exists' => 'Nessuna categoria',
            'tags.exists' => 'Tag non valido',
        ]);

        $data = $request->all();

        $post = new Post();

        $post->fill($data);

        $post->slug = Str::slug($post->title, '-');

        $post->user_id = Auth::id();
        $post->save();

        // Operazione da fare DOPO aver salvato
        if(array_key_exists('tags', $data)) {
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.store', $post)
            ->with('message', 'Post creato con successo')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::select('id', 'label',)->get();
        $categories = Category::all();
        $tags_ids_array = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tags_ids_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ], [
            'category_id.exists' => 'Nessuna categoria',
            'tags.exists' => 'Tag non valido',
        ]);

        $data = $request->all();
        $categories = Category::all();

        $data['slug'] = Str::slug($data['title'], '-');
        
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post', 'categories'))
            ->with('message', 'Post modificato con successo')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(count($post->tags)) $post->tags->detach();
        $post->delete();
        return redirect()->route('admin.posts.index')
            ->with('message', 'Post eliminato con successo')
            ->with('type', 'danger');
    }
}

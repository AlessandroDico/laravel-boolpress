<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all(),
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];
        // dd($data);

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newPost = new Post();
        $newPost->fill($data);

        // genero lo slug come nelle seeder prendendo il titolo questa volta dal form (la "formula" per lo slug è identica)
        $slug = Str::slug($newPost->title, '-');

        $slugEditable = $slug;
        $currentSlug = Post::where('slug', $slug)->first();
        $contatore = 1;
        while($currentSlug) {
            $slug = $slugEditable . '-' . $contatore;
            $contatore++;
            $currentSlug = Post::where('slug', $slug)->first();
        }

        $newPost->slug = $slug;

        $newPost->save();
        $newPost->tags()->sync($data['tags']);


        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if ($post) {
            $data = [
                'post' => $post,
            ];
            return view('admin.posts.show', $data);
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post,
            'categories' => Category::all(),
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        // dd($data);

        // se il titolo che arriva alla request è diverso al titolo che c'era in precedenza devo ricreare lo slug
        if ($data['title'] != $post->title) {

            $slug = Str::slug($data['title'], '-');

            $slugEditable = $slug;
            $currentSlug = Post::where('slug', $slug)->first();
            $contatore = 1;
            while($currentSlug) {
                $slug = $slugEditable . '-' . $contatore;
                $contatore++;
                $currentSlug = Post::where('slug', $slug)->first();
            }

            $data['slug'] = $slug;
        }
        $post->update($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}

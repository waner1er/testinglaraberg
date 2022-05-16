<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use VanOns\Laraberg\Models\Content;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    /**
     * Display a listing of users resource.
     */

    public function myposts(): View
    {

        return view('posts.myposts', ['posts' => Auth::user()->posts()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('posts.create', [
                'posts' => Post::all(),
                'categories' => Category::all(),
                'ages' => Age::all()
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $content = $request->body;
        $post = new Post();

        $post->lb_content = $content;
        $post->user_id = Auth::user()->id;
        $post->excerpt = $request->excerpt;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->age_id = $request->age_id;
        $post->published = $request->published;

        $post->save();
        return redirect()->route('posts.myposts');
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'categories' => Category::all(), 'ages' => Age::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->lb_content  = $request->body;
        $post->excerpt = $request->excerpt;
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->age_id = $request->age_id;
        $post->published = $request->published;

        dd($post);
        $post->update();
        return redirect()->route('posts.myposts');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.myposts');
    }
}

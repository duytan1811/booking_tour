<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Blog::query();
        $searchValue = "";
        if ($request->has('search')) {
            $searchValue = $request->search;
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            $searchValue = $request->search;
            $query->where('category_id',  $request->category);
        }

        $blogs = $query->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all();

        $recentBlogs = Blog::inRandomOrder()->limit(3)->get();
        return view('client.blogs.index', compact('blogs', 'categories', 'searchValue', 'recentBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $blog = Blog::findOrFail($id);
        $searchValue = "";
        $categories = Category::all();
        $recentBlogs = Blog::inRandomOrder()->limit(3)->get();
        $comments = Comment::query()->where('type', 2)->where('object_id', $id)->where('status', 1)->get();

        return view('client.blogs.detail', compact('blog', 'searchValue', 'categories', 'recentBlogs', 'comments'));
    }

    public function comment(Request $request)
    {
        $this->validateCommentForm($request);

        Comment::create($request->all());

        return redirect()->route('blogs.show', $request->object_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    private function validateCommentForm(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ], [
            'comment.required'       => 'Vui lòng nhập nội dung',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $blogs = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blogs.index', compact('blogs', 'searchValue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog = new Blog();
        $categories = Category::query()->pluck('name', 'id')->toArray();
        $blog_types = config('constants.blog_types');
        return view('admin.blogs.create', compact('blog', 'categories', 'blog_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $data = $request->all();
        if ($request->has('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = 'blank.png';
        }
        if ($request->has('image_1')) {
            $path1 = $request->file('image_1')->store('uploads', 'public');
            $data['image_1'] = $path1;
        } else {
            $data['image_1'] = 'blank.png';
        }
        Blog::create($data);
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id, string $tab)
    {
        $blog = Blog::findOrFail($id);
        $comments = Comment::query()->where('type', 2)->where('object_id', $id)->paginate(20)->withPath('/admin/blogs/' . $id . '/tab/comment');

        return view('admin.blogs.detail', compact('blog', 'comments', 'tab'));
    }

    public function approval(Request $request, string $id)
    {
        $comment = Comment::findOrFail($request->comment_id);
        $comment->update(['status' => $request->status]);
        return redirect()->route('admin.blogs.detail', ['id' => $id, 'tab' => 'comment']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::query()->pluck('name', 'id')->toArray();
        $blog_types = config('constants.blog_types');

        return view('admin.blogs.edit', compact('blog', 'categories', 'blog_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $blog = Blog::findOrFail($id);

        $data = $request->all();

        if ($request->has('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $path;
        }

        if ($request->has('image_1')) {
            if ($blog->image_1) {
                Storage::disk('public')->delete($blog->image_1);
            }
            $path1 = $request->file('image_1')->store('uploads', 'public');
            $data['image_1'] = $path1;
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048'
        ], [
            'name.required'       => 'Vui lòng nhập tên bài viết',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'type.required' => 'Vui lòng chọn loại',
            'image.mimes' => 'Hình ảnh không đúng định dạng',
            'image.max' => 'Dung lượng ảnh nhỏ hơn 2048kb',
        ]);
    }
}

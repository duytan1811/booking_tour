<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query();
        $searchValue = "";
        if ($request->has('search')) {
            $searchValue = $request->search;
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.categories.index', compact('categories', 'searchValue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Category::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.categories.index');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required'       => 'Vui lòng nhập tên danh mục',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tour::query();
        $searchValue = "";
        if ($request->has('search')) {
            $searchValue = $request->search;
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('destination', 'like', '%' . $request->search . '%');
        }

        $tours = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.tours.index', compact('tours', 'searchValue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tour = new Tour();
        $tour_types = config('constants.tour_types');
        return view('admin.tours.create', compact('tour', 'tour_types'));
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

        Tour::create($data);
        return redirect()->route('admin.tours.index');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id, string $tab)
    {
        $tour = Tour::findOrFail($id);
        $comments = Comment::query()->where('type', 1)->where('object_id', $id)->paginate(2)->withPath('/admin/tours/' . $id . '/tab/comment');

        return view('admin.tours.detail', compact('tour', 'comments', 'tab'));
    }

    public function approval(Request $request, string $id)
    {
        $comment = Comment::findOrFail($request->comment_id);
        $comment->update(['status' => $request->status]);
        return redirect()->route('admin.tours.detail', ['id' => $id, 'tab' => 'comment']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tour = Tour::findOrFail($id);
        $tour_types = config('constants.tour_types');
        return view('admin.tours.edit', compact('tour', 'tour_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $tour = Tour::findOrFail($id);

        $data = $request->all();
        if ($request->has('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $path;
        }

        $tour->update($data);
        return redirect()->route('admin.tours.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.tours.index');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'people' => 'required',
            'price' => 'required|numeric',
            'destination' => 'required',
            'age_restriction' => 'required',
            'departure_time' => 'required|date',
            'return_time' => 'required|date|',
        ], [
            'name.required'       => 'Vui lòng nhập tên tour',
            'people.required'       => 'Vui lòng nhập số người tham gia',
            'price.required'       => 'Vui lòng nhập giá tour',
            'price.numeric'        => 'Giá tour phải là số',
            'price.min'            => 'Giá tour phải lớn hơn 0',
            'destination.required' => 'Vui lòng nhập điểm đến',
            'age_restriction.required' => 'Vui lòng nhập giới hạn tuổi',
            'departure_time.required'  => 'Vui lòng chọn ngày bắt đầu',
            'return_time.required'    => 'Vui lòng chọn ngày kết thúc',
        ]);
    }
}

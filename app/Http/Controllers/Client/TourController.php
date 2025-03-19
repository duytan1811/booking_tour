<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tour::query();
        $search_name = "";
        $search_destination = "";
        $search_departure_time = "";
        $search_type = "";

        if ($request->has('name') && !empty($request->name)) {
            $search_name = $request->name;
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('destination') && !empty($request->destination)) {
            $search_destination = $request->destination;
            $query->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->has('departure_time') && !empty($request->departure_time)) {
            $search_departure_time = $request->departure_time;
            $query = $query->where('departure_time', Carbon::parse($request->departure_time));
        }

        if ($request->has('type')) {
            $search_type = $request->type;
            if ($request->type !== 'all') {
                $query = $query->where('type', $request->type);
            }
        }

        $tours = $query->orderBy('created_at', 'desc')->paginate(20);
        $tour_types = config('constants.tour_types');
        return view('client.tours.list', compact('tours', 'tour_types', 'search_destination', 'search_name', 'search_departure_time', 'search_type'));
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
    public function show(string $id)
    {
        $tour = Tour::findOrFail($id);
        $search_name = "";
        $search_departure_time = "";
        $search_type = "";
        $tour_types = config('constants.tour_types');
        $comments = Comment::query()->where('object_id', $id)->where('type', 1)->where('status', 1)->get();
        return view('client.tours.detail', compact('tour', 'tour_types', 'search_name', 'search_departure_time', 'search_type', 'comments'));
    }

    public function comment(Request $request)
    {
        $this->validateCommentForm($request);

        Comment::create($request->all());

        return redirect()->route('tours.show', $request->object_id);
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

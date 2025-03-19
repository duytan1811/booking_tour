<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourBooking;
use App\Models\TourBookingDetail;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TourBooking::query();
        $searchValue = "";
        if ($request->has('search')) {
            $searchValue = $request->search;
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $tour_bookings = $query->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.bookings.index', compact('tour_bookings', 'searchValue'));
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
        $tour_booking = TourBooking::findOrFail($id);
        $tour_booking_details = TourBookingDetail::query()->where('tour_booking_id',$id)->get();

        return view('admin.bookings.detail', compact('tour_booking','tour_booking_details'));
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
        $tour_booking = TourBooking::findOrFail($id);
        $tour_booking->update(['status'=>$request->status]);

        return redirect()->route('admin.bookings.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = TourBooking::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.booking.index');
    }
}

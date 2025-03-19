<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourBooking;
use App\Models\TourBookingDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function booking(string $tourId)
    {
        $tour = Tour::findOrFail($tourId);
        return view('client.checkout.index', compact('tour'));
    }

    public function success()
    {
        return view('client.checkout.success');
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
        $tour = Tour::findOrFail($request->tour_id);
        $tour_booking = TourBooking::create(
            [
                'user_id'=>$request->user_id,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'total_price'=>$tour->price
            ]
        );

        $tour_booking_detail = TourBookingDetail::create([
            'tour_id' => $request->tour_id,
            'tour_booking_id' => $tour_booking->id,
            'price' => $tour->price,
        ]);

        return redirect()->route('checkout.success');
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
}

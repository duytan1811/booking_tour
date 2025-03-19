<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourBooking;
use App\Models\TourBookingDetail;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $current_user = auth()->user();
        $tour_bookings = TourBookingDetail::query()->with(['tour_booking' => function ($query) use ($current_user) {
            $query->where('user_id', $current_user->id);
        }])->with('tour_booking')->get();

        return view('client.accounts.index', compact('tour_bookings'));
    }
}

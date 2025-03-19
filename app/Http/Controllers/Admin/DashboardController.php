<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $wait_tour_booking_data = TourBooking::query()->where('status', 0)->get();
        $wait_sum_amount = $wait_tour_booking_data->sum('total_price');
        $wait_tour_bookings = $wait_tour_booking_data->take(5);
        $sum_amount_today = TourBooking::query()->where('status',1)->whereDate('created_at', Carbon::today())->sum('total_price');
        $wait_sum_amount_today =  TourBooking::query()->where('status', 0)->whereDate('created_at', Carbon::today())->sum('total_price');

        return view('admin.dashboard.index', compact('wait_tour_bookings', 'wait_sum_amount', 'sum_amount_today','wait_sum_amount_today'));
    }
}

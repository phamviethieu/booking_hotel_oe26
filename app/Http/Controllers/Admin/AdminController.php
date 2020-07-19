<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Notification;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    protected $bookingRepo;

    public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function dataChart()
    {
        $year = now()->year;
        $sum_revenue = DB::table('bookings')
            ->select(DB::raw('SUM(price) as sum'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', $year)
            ->where('status', config('status.booking_status.approved'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        $data_chart = array_fill(
            config('chart.start_index'),
            config('chart.end_index'),
            config('chart.value_default')
        );

        foreach ($sum_revenue as $key => $sum_revenue) {
            $data_chart[$sum_revenue->month - 1] = $sum_revenue->sum;
        }

        $title = trans('message.chart.title_revenue_chart') . '(' . $year . ') ';
        $label = trans('message.chart.revenue');
        $month = trans('message.chart.month');
        $data = [
            'year' => $year,
            'title' => $title,
            'label' => $label,
            'labels' => $month,
            'totals' => $data_chart,
        ];

        return response()->json($data);
    }

    public function readNotification(Request $request)
    {
        $id = $request->id;
        $notification = Notification::find($id);
        $notification->update([
            'status' => config('status.noti.read')
        ]);

        $booking_id = $request->booking_id;

        $booking = $this->bookingRepo->find($booking_id);
        $booking['user_name'] = $booking->user->name;
        $booking['phone_number'] = $booking->user->phone_number;
        $booking['email'] = $booking->user->email;

        $noti_count = Notification::where('status', config('status.noti.unread'))
            ->count();

        $booking['noti_count'] = $noti_count;

        return response()->json($booking);
    }
}

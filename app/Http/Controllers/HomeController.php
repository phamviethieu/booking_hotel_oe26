<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Room;
use App\Models\Video;
use App\Models\BookingDetail;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $hotel = Hotel::with('ratings')
                ->findorFail(config('contacts_hotel.id'));
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }

        return view('index', [
            'hotel' => $hotel,
            'hotel_name' => $hotel->name,
            'hotel_slogan' => $hotel->slogan,
        ]);
    }

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

}

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
            $hotel = Hotel::findorFail(1);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }

        return view('index', [
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

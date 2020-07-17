<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Hotel\HotelRepositoryInterface;

class HomeController extends Controller
{
    protected $hotelRepo;

    public function __construct(HotelRepositoryInterface $hotelRepo)
    {
        $this->hotelRepo = $hotelRepo;
    }

    public function index()
    {
        try {
            $hotel = $this->hotelRepo
                ->findWith(config('contacts_hotel.id'), 'ratings');
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

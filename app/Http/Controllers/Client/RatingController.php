<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Repositories\Rating\RatingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    protected $ratingRepo;

    public function __construct(RatingRepositoryInterface $ratingRepo)
    {
        $this->ratingRepo = $ratingRepo;
    }

    public function index()
    {
        $rate = Auth::user()
            ->ratings
            ->first();

        return view('functions.rating', compact('rate'));
    }

    public function update(RatingRequest $request, $id)
    {
        try {
            $this->ratingRepo->update($id, [
                'rate' => $request->rate,
                'content' => $request->input('content'),
            ]);

            return true;
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }

    }

    public function store(RatingRequest $request)
    {
        $user_id = Auth::id();
        
        $this->ratingRepo->create([
            'user_id' => $user_id,
            'hotel_id' => config('contacts_hotel.id'),
            'rate' => $request->rate,
            'content' => $request->input('content'),
        ]);

        return $request->all();
    }
}

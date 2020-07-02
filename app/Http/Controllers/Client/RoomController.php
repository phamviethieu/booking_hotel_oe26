<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $types = Type::paginate(config('paginate.paginations'));

        return view('functions.room_list', [
            'types' => $types,
        ]);
    }

    public function show($id)
    {
        try {
            $type = Type::find($id);
            $comment_recent = $type
                ->comments()
                ->latest('created_at')
                ->first();

            return view('functions.room_detail', [
                'type' => $type,
                'comment_recent' => $comment_recent,
            ]);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }
}

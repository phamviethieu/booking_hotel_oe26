<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Room;
use App\Models\Type;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::paginate(config('paginate.paginations'));
        $type = Type::all();

        return view('admin.rooms.list', compact('rooms', 'types'));
    }

    public function create()
    {
        $type = Type::all();
        $hotel = Hotel::all();

        return view('admin.rooms.add', compact('type', 'hotel'));
    }

    public function store(RoomRequest $request)
    {
        $room = $request->all();
        $room = Room::create($room);
        Session::flash('created', trans('message.alert.roomCreated'));

        return redirect()->route('rooms.index');
    }

    public function edit($id)
    {
        try {
            $room = Room::findOrFail($id);
            $type = Type::all();
            $hotel = Hotel::all();
            return view('admin.rooms.edit', compact('room', 'type', 'hotel'));

        } catch (ModelNotFoundException $e) {

            return view('errors.404');
        }
    }

    public function update(RoomRequest $request, $id)
    {
        try {
            $room = Room::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        $room->update($request->all());
        Session::flash('updated', trans('message.alert.roomUpdated'));

        return redirect()->route('rooms.index');

    }

    public function destroy($id)
    {
        try {
            $room = Room::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return view('errors.404');
        }
        $room->delete();
        Session::flash('deleted', trans('message.alert.roomDeleted'));
        Session::flash('icon', trans('success'));

        return redirect()->route('rooms.index');
    }
}

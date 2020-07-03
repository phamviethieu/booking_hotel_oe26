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

        return view('admin.rooms.list', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.add');
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

            return view('admin.rooms.edit', compact('room', 'types', 'hotels'));
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

    public function bookingsOfRoom($id)
    {
        $room = Room::with('bookings')->find($id);

        if ($room->bookings->count()) {
            $response = '';
            foreach ($room->bookings as $booking) {
                $checkin = date('H:i:s d/m/Y', strtotime($booking->checkin));
                $checkout = date('H:i:s d/m/Y', strtotime($booking->checkout));
                $response .= '<li class="list-group-item">
                        <i class="fas fa-barcode"></i>'
                    . config('contacts_hotel.prefix_booking_code')
                    . $booking->id . '&nbsp; - '
                    . '<i class="fas fa-user"></i>&nbsp;'
                    . $booking->user->name
                    . '<br>';
                $response .= '<span class="badge badge-success">&nbsp;'
                        . trans('message.booking.checkin') . ':</span>&nbsp;'
                        . $checkin;
                $response .= '&nbsp;<span class="badge badge-secondary">&nbsp;'
                        . trans('message.booking.checkout') . ':</span>&nbsp;'
                        . $checkout
                        . '<br></li>';
            }
            return $response;

        } else {
            return trans('message.admin.room_empty_booking');
        }
    }

    public function filterRoomByType($type_id)
    {
        $rooms = Room::with('type')->ofType($type_id)->get();
        $response = '<div class="card-body pb-0 ">
                    <div class="row d-flex align-items-stretch ">';
        foreach ($rooms as $room) {
            $response .= '<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch justify-content-center mt-3">
                      <div class="card bg-light">
                           <div class="card-header text-muted border-bottom-0">'
                . trans('message.room') . ' '
                . $room->name
                .           '</div>
                           <div class="card-body pt-0">
                               <div class="row">
                                   <div class="col-7">
                                       <h2 class="lead"><b>'
                                       . $room->type->name
                                       . '</b></h2>
                                   </div>
                                   <div class="col-5 text-center">';
            switch ($room->status) {
                case(config('status.room_status.busy')):
                    $response .= '<span class="badge badge-secondary">'
                            . trans('message.status.waiting')
                        . '</span>';
                    break;
                case(config('status.room_status.ready')):
                    $response .= '<span class="badge badge-success">'
                            . trans('message.status.ready')
                        . '</span>';
                    break;
            }
            $response .=  '                 </div>
                               </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="'
                                    . route('rooms.edit', $room->id)
                                    . '" class="btn btn-sm bg-teal">
                                        <i class="fas fa-pen-alt"></i>'
                                        . trans('message.functions.edit')
                                    .'</a>
                                    <a class="btn btn-sm btn-primary text-white roomDetail" data-toggle="modal" data-id="'
                                        . $room->id
                                        . '" data-target="#exampleModal">
                                         <i class="fas fa-house-user"></i>'
                                        . trans('message.viewDetail')
                                    . '</a>
                                    <div class="float-right pl-1">
                                        <form action="'
                                            . route('rooms.destroy', $room->id)
                                            . '"class="formDelete form'
                                            . $room->id
                                            . '" method="POST">'
                                            . method_field('DELETE')
                                            . csrf_field()
                                            . '<button type="submit" id="btn-submit"
                                            class="btn btn-sm btn-danger delete">
                                            <i class="fas fa-trash-alt"></i>'
                                            . trans('message.functions.delete')
                                            . '</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        $response .= '</div>
               </div>
               <div class="card-footer">
                   <nav aria-label="">
               </nav>
               </div>';
        return $response;
    }
}

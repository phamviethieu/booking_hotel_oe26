<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Requests\TypeRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::paginate(config('paginate.paginations'));

        return view('admin.types.list', compact('types'));
    }

    public function create()
    {
        return view('admin.types.add');
    }

    public function store(Request $request)
    {
        $type = Type::create($request->all());

        Video::create([
            'type_id' => $type->id,
            'video' => $request->input('video'),
        ]);
        if ($images = $request->image) {
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $name = Str::random(config('config.random_prefix_file_name')) . "_" . $name;
                while (file_exists(config('contacts_hotel.url_room_default') . $name)) {
                    $name = Str::random(config('config.random_prefix_file_name')) . "_" . $name;
                }
                $image->move(config('contacts_hotel.url_room_default'), $name);

                Image::create([
                    'image' => $name,
                    'type_id' => $type->id,
                ]);
            }
        }
        Session::flash('created', trans('message.alert.typeCreated'));

        return redirect()->route('types.index');
    }

    public function edit($id)
    {
        try {
            $type = Type::findOrFail($id);

            return view('admin.types.edit', compact('type'));
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    public function update(TypeRequest $request, $id)
    {
        try {
            $type = Type::with('images')->findOrFail($id);
            $video = Video::findOrFail($request->input('video_id'));

            $video->update([
                'video' => $request->input('video')
            ]);
            if ($images = $request->image) {
                foreach ($type->images as $old_image) {
                    $old_image->delete();
                }
                foreach ($images as $image) {
                    $name = $image->getClientOriginalName();
                    $name = Str::random(config('config.random_prefix_file_name')) . "_" . $name;
                    while (file_exists(config('contacts_hotel.url_room_default') . $name)) {
                        $name = Str::random(config('config.random_prefix_file_name')) . "_" . $name;
                    }
                    $image->move(config('contacts_hotel.url_room_default'), $name);
                    Image::create([
                        'image' => $name,
                        'type_id' => $type->id,
                    ]);
                }
            }
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        $type->update($request->all());
        Session::flash('updated', trans('message.alert.typeUpdated'));

        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        try {
            $type = Type::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        $type->delete();
        Session::flash('deleted', trans('message.alert.typeDeleted'));
        Session::flash('icon', trans('success'));

        return redirect()->route('types.index');
    }
}

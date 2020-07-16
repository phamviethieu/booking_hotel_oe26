<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use Illuminate\Support\Facades\Session;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Video\VideoRepositoryInterface;
use App\Repositories\Type\TypeRepositoryInterface;

class TypeController extends Controller
{
    protected $imageRepo;
    protected $videoRepo;
    protected $typeRepo;

    public function __construct(
        ImageRepositoryInterface $imageRepo,
        VideoRepositoryInterface $videoRepo,
        TypeRepositoryInterface $typeRepo
    ) {
        $this->imageRepo = $imageRepo;
        $this->videoRepo = $videoRepo;
        $this->typeRepo = $typeRepo;
    }

    public function index()
    {
        $types = $this->typeRepo
            ->paginate(config('paginate.paginations'));

        return view('admin.types.list', compact('types'));
    }

    public function create()
    {
        return view('admin.types.add');
    }

    public function store(Request $request)
    {
        $type = $this->typeRepo->create($request->all());

        $this->videoRepo->create([
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

                $this->imageRepo->create([
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
            $type = $this->typeRepo->find($id);

            return view('admin.types.edit', compact('type'));
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    public function update(TypeRequest $request, $id)
    {
        try {
            $type = $this->typeRepo->findWith($id, 'images');
            $this->videoRepo->update($request->input('video_id'), [
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
                    $this->imageRepo->create([
                        'image' => $name,
                        'type_id' => $type->id,
                    ]);
                }
            }
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
        $this->typeRepo->update($id, $request->all());
        Session::flash('updated', trans('message.alert.typeUpdated'));

        return redirect()->route('types.index');
    }

    public function destroy($id)
    {
        try {
            $this->typeRepo->delete($id);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }

        Session::flash('deleted', trans('message.alert.typeDeleted'));
        Session::flash('icon', trans('success'));

        return redirect()->route('types.index');
    }
}

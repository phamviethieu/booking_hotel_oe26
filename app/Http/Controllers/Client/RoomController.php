<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Type\TypeRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $typeRepo;

    public function __construct(TypeRepositoryInterface $typeRepo)
    {
        $this->typeRepo = $typeRepo;
    }

    public function index()
    {
        $types = $this->typeRepo->paginate(config('paginate.paginations'));

        return view('functions.room_list', [
            'types' => $types,
        ]);
    }

    public function show($id)
    {
        try {
            $type = $this->typeRepo->find($id);
            $comment_recent = $this->typeRepo->getCommentRecent($id);

            return view('functions.room_detail', [
                'type' => $type,
                'comment_recent' => $comment_recent,
            ]);
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }
}

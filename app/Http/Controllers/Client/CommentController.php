<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Comment\CommentRepositoryInterface;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function store(CommentRequest $request)
    {
        $data = array_merge($request->all(), ['user_id' => Auth::id()]);
        $this->commentRepo->create($data);
        Session::flash('message', trans('message.alert.comment_created'));
        Session::flash('icon', 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $this->commentRepo->delete($id);
            Session::flash('message', trans('message.alert.comment_deleted'));
            Session::flash('icon', 'success');

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }
}

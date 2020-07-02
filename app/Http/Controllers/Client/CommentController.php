<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $data =  array_merge($request->all(), ['user_id' => Auth::id()]);
        Comment::create($data);
        Session::flash('message', trans('message.alert.comment_created'));
        Session::flash('icon', 'success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            Session::flash('message', trans('message.alert.comment_deleted'));
            Session::flash('icon', 'success');

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }
}

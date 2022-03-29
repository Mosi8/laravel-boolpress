<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

    public function update(Request $request, Comment $comment)
    {
        $comment->approved = true;
        $comment->save();

        return redirect()->route("admin.posts.show", $comment->post_id);
    }

    public function destroy(Comment $comment)
    {
        $post_id = $comment->post_id;

        $comment->delete();

        return redirect()->route("admin.posts.show", $post_id);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // return response()->json([
        //     "name" => "Maurizio",
        //     "surname" => "Mosiello"
        // ]);

        $posts = Post::all();
        return response()->json($posts);
    }
}

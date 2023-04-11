<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $list  = \Storage::disk('s3')->allFiles('');
        $url = \Storage::disk('s3')->url("tajimamusic/");
        
        return view('posts/index')->with(['posts' => $post->get(), 'list'=> $list, 'url'=> $url]);  
    }
}
?>
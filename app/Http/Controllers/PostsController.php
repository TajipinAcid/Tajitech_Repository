<?php

// 略

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
  public function add()
  {
      return view('posts.create');
  }

  public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`tajimamusic`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('tajimamusic', $image, 'public');
      // アップロードした画像のフルパスを取得
      $post->image_path = Storage::disk('s3')->url($path);

      $post->save();

      return redirect('posts/create');
  }
}
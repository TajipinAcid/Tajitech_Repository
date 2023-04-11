<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    
    // S3へのファイルアップロード
    public function uploadS3(Request $request)
    {//dd($request);
        // バリデーション
        $request->validate(
            [
                'audio' => 'required|mimes:mp3,mpeg',
            ]
        );
        //dd($request);
        // S3へファイルをアップロード
        $result = Storage::disk('s3')->putFile('/', $request->file('audio'));
       
        // アップロードの成功判定
        if ($result) {
            return 'アップロード成功';
        }else {
            return 'アップロード失敗';
        }
    }
    
}
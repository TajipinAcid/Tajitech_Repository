{{--<?php phpinfo(); ?>--}}
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ファイルアップロード</title>
</head>
<body>
    <h1>Remote Ensemble</h1>
    <h4>MP3ファイルをアップロードしてください。</h4>
    <form action="{{ route('s3') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="audio" id="">
        <input type="submit" value="アップロード">
    </form>
    
     <a href="/posts/index" >投稿一覧</a>
    
</body>
</html>
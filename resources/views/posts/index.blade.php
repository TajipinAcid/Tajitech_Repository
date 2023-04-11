{{--<?php phpinfo(); ?>--}}
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>音楽再生</title>
</head>
    <body>
        <h1>投稿一覧</h1>
        
        <a href="/posts/upload">upload!</a>
        
        <div>
            @foreach($list as $post)
          {{--<audio controls src="https://s3.amazonaws.com/tajimamusic/{{$post}}"></audio>--}}
          
          <audio controls autoplay>
                <source src="https://s3.amazonaws.com/tajimamusic/{{$post}}">
            </audio>
          
          <h2 class='title'>{{$post}}</h2>
            @endforeach
         
        </div>
    </body>
</html>
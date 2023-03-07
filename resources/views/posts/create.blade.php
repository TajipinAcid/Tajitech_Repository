<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sample</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Name</h1>
        <form action="create" method="post" enctype="multipart/form-data">
             <input type="file" name="image">
            {{ csrf_field() }}
            <input type="submit" value="アップロード">
        </form>
    </body>
</html>
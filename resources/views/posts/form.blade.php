<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>sample</title>
    </head>
    <body>
        <form action="regist.php" method="post" enctype="multipart/form-data">
            <input type="file" name="upfile" size="30">
            <input type="submit" value="アップロード">
        </form>
    </body>
</html>
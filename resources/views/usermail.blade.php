<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User mail</title>

        <!-- Fonts -->
        <!-- Styles -->

    </head>
    <body>
        <h3>Hello {{ $data["name"] }}</h3>
        <p>You account has  been successfully created. Verify your account by <a href="{{ route("verify",$data["token"])}}">click here</a></p>
    </body>
</html>

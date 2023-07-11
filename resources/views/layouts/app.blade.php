<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/">
                Система за публикация на новини
            </a>
        </nav>
        
        <div class="flex-grow-1-1-auto">
            @yield('content')
        </div>
    </body>
</html>
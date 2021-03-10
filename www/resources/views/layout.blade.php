<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/border.css">
        <title>L̶e̶s̶s̶o̶n̶ ̶1̶3̶// FIXING STUFF</title>
    </head>
    <body>
        <div class="m-3 bigBorder">
            <div class="form-group row m-2">
                <div class="m-3 text-center">
                    <p> L̶e̶s̶s̶o̶n̶ ̶1̶3̶ ̶// FIXING STUFF </p>
                    <div class="m-3 text-center border border-danger">
                        <div class="m-3 text-center">
                            @auth
                                <p class="m-3">{{ Auth::user()['name'] }} is currently logedin</p>
                                <button onclick="location.href='{{ route('logout') }}'" type="submit" class="btn btn-danger m-3" name="button">Logout</button>
                            @endauth
                            @guest
                                <button onclick="location.href='{{ route('login') }}'" type="submit" class="btn btn-danger m-3" name="button">Login</button>
                            @endguest
                        </div>
                        <button onclick="location.href='{{ route('list-all-categories') }}'" type="submit" class="btn btn-danger mb-3" name="button">CATEGORIES</button>
                        <button onclick="location.href='{{ route('home') }}'" type="submit" class="btn btn-danger mb-3" name="button">HOME</button>
                        <button onclick="location.href='{{ route('list-all-tags') }}'" type="submit" class="btn btn-danger mb-3" name="button">TAGS</button>
                    </div>
                </div>
            </div>
            @yield('post-display')
            @yield('category-display')
            @yield('tag-display')
            @yield('form-post')
            @yield('form-category')
            @yield('form-tag')
            @yield('form-login')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>

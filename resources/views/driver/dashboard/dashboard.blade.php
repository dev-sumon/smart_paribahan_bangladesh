<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Document') }}</title>
</head>
<body>
    <h1>{{ __('Driver Dashbaord') }}</h1>
    <li class="nav-item dropdown">
        <a class="dropdown-item" href="{{ route('driver.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </li>
</body>
</html>
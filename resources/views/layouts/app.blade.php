<!-- filepath: c:\xampp\htdocs\activity 4\WebDev\resources\views\layouts\app.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>App</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('students.index') }}">Home</a></li>
            @auth
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            @endauth
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
        </ul>
    </nav>

    <div>
        @yield('content')
    </div>
</body>
</html>
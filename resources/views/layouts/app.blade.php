<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Seat Booking App</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Seat Booking App</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Administration
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('office/all') }}">Office</a>
                    <a class="dropdown-item" href="{{ url('employee/all') }}">Employee</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('booking/select-office-and-employee') }}">Book Seat</a>
            </li>


        </ul>
    </nav>

    @yield('content')


    <footer class="footer mt-auto py-3 bk-dark">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
</body>

</html>
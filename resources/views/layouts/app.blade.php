<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('node_modules/@fullcalendar/core/main.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/@fullcalendar/daygrid/main.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/@fullcalendar/timegrid/main.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/core/main.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/daygrid/main.min.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/timegrid/main.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="{{ asset('node_modules/@fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('node_modules/@fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('node_modules/@fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('node_modules/@fullcalendar/interaction/main.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Calendar App</a>
        </nav>
        <div class="container mt-4">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('events.index') }}" class="btn btn-primary">Events</a>
                <a class="nav-link" href="{{ route('events.calendar') }}" class="btn btn-primary">Calendar</a>
            </li>
        </ul>
        @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/core@latest/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid@latest/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/timegrid@latest/main.min.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction@latest/main.min.js"></script>
    @stack('scripts')
</body>
</html>

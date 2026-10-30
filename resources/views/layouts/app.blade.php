<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Marketplace')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Messages Flash --}}
    @if (session('message'))
        <div class="message-alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- Contenu Principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>

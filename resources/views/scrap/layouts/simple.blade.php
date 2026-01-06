<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Additional head content -->
    @yield('head')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">@yield('page-title', 'My Laravel App')</h1>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-blue-500 text-white p-2">
        <div class="container mx-auto">
            @yield('navigation', '
                <a href="/" class="hover:underline mr-4">Home</a>
                <a href="/about" class="hover:underline mr-4">About</a>
                <a href="/contact" class="hover:underline">Contact</a>
            ')
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto my-8 px-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>

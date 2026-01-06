<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic Title --}}
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {{-- Meta Description --}}
    <meta name="description" content="{{ $description ?? 'A Laravel application' }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Scripts and Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional Styles (can be pushed from child views) --}}
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    {{-- Navigation --}}
    <nav class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                {{-- Logo/Brand --}}
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 dark:text-white">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>

                {{-- Navigation Links (can be customized per page) --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @yield('navigation')
                </div>

                {{-- User Menu --}}
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                            Login
                        </a>
                    @else
                        <span class="text-gray-700 dark:text-gray-300">
                            Welcome, {{ Auth::user()->name }}!
                        </span>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- Page Header (optional section) --}}
    @hasSection('header')
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>
    @endif

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mx-4 mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mx-4 mt-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Main Content Area --}}
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- This is where child view content will be inserted --}}
            @yield('content')
        </div>
    </main>

    {{-- Sidebar (optional, can be yielded from child views) --}}
    @hasSection('sidebar')
        <aside class="fixed top-0 right-0 w-64 h-full bg-gray-100 dark:bg-gray-800 shadow-lg">
            @yield('sidebar')
        </aside>
    @endif

    {{-- Footer --}}
    <footer class="bg-white dark:bg-gray-800 shadow-sm border-t border-gray-100 dark:border-gray-700 mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="text-gray-500 dark:text-gray-400 text-sm">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </div>
                <div class="flex space-x-6 text-sm text-gray-500 dark:text-gray-400">
                    <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">Privacy</a>
                    <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">Terms</a>
                    <a href="#" class="hover:text-gray-700 dark:hover:text-gray-300">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Additional Scripts (can be pushed from child views) --}}
    @stack('scripts')

    {{-- Page-specific JavaScript --}}
    @yield('scripts')
</body>
</html>

{{-- Extending the main layout --}}
@extends('layouts.app')

{{-- Setting the page title --}}
@section('title', 'Example Page - My Laravel App')

{{-- Adding page-specific meta description --}}
@php
    $description = 'This is an example page showing how Laravel layouts work with sections and content injection.';
@endphp

{{-- Adding custom navigation links --}}
@section('navigation')
    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 dark:text-white focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
        Home
    </a>
    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
        About
    </a>
    <a href="#" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
        Services
    </a>
@endsection

{{-- Adding a page header --}}
@section('header')
    <div class="flex justify-between items-center">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Example Page
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Demonstrating Laravel layout inheritance and sections
            </p>
        </div>
        <div>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                Action Button
            </button>
        </div>
    </div>
@endsection

{{-- Push additional CSS styles --}}
@push('styles')
    <style>
        .custom-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
@endpush

{{-- Main content section --}}
@section('content')
    <div class="fade-in">
        {{-- Hero Section --}}
        <div class="custom-card rounded-lg shadow-xl p-8 text-white mb-8">
            <h1 class="text-4xl font-bold mb-4">Welcome to Laravel Layouts!</h1>
            <p class="text-xl opacity-90">
                This page demonstrates how to use Laravel's Blade templating system with layouts, sections, and content injection.
            </p>
        </div>

        {{-- Content Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            {{-- Card 1: Layout Basics --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Layout Inheritance</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400">
                    Use <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm">@extends('layouts.app')</code>
                    to inherit from a parent layout file.
                </p>
            </div>

            {{-- Card 2: Sections --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Content Sections</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400">
                    Define content areas with <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm">@section</code>
                    and insert them with <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm">@yield</code>.
                </p>
            </div>

            {{-- Card 3: Components --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Blade Components</h3>
                </div>
                <p class="text-gray-600 dark:text-gray-400">
                    Create reusable components with <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded text-sm">&lt;x-component&gt;</code>
                    for better code organization.
                </p>
            </div>
        </div>

        {{-- Code Examples --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Layout Code Examples</h3>

            <div class="space-y-4">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">1. Extending a Layout:</h4>
                    <pre class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg overflow-x-auto"><code class="text-sm">{{-- In your view file --}}
@extends('layouts.app')

@section('content')
    &lt;h1&gt;Your page content here&lt;/h1&gt;
@endsection</code></pre>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">2. Defining Sections:</h4>
                    <pre class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg overflow-x-auto"><code class="text-sm">{{-- Multiple ways to define sections --}}
@section('title', 'Page Title')

@section('content')
    &lt;p&gt;Main content goes here&lt;/p&gt;
@endsection

@section('scripts')
    &lt;script&gt;console.log('Page loaded');&lt;/script&gt;
@endsection</code></pre>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">3. Pushing to Stacks:</h4>
                    <pre class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg overflow-x-auto"><code class="text-sm">{{-- Add styles or scripts to stacks --}}
@push('styles')
    &lt;link rel="stylesheet" href="custom.css"&gt;
@endpush

@push('scripts')
    &lt;script src="custom.js"&gt;&lt;/script&gt;
@endpush</code></pre>
                </div>
            </div>
        </div>

        {{-- Data Display Example --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Dynamic Content</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">Server Information:</h4>
                    <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                        <li><strong>Laravel Version:</strong> {{ app()->version() }}</li>
                        <li><strong>PHP Version:</strong> {{ phpversion() }}</li>
                        <li><strong>Current Time:</strong> {{ now()->format('Y-m-d H:i:s') }}</li>
                        <li><strong>Environment:</strong> {{ app()->environment() }}</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-medium text-gray-900 dark:text-white mb-2">Request Information:</h4>
                    <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                        <li><strong>Current URL:</strong> {{ request()->url() }}</li>
                        <li><strong>Method:</strong> {{ request()->method() }}</li>
                        <li><strong>User Agent:</strong> {{ Str::limit(request()->userAgent(), 50) }}</li>
                        <li><strong>IP Address:</strong> {{ request()->ip() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Add a sidebar --}}
@section('sidebar')
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Quick Links</h3>
        <nav class="space-y-2">
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                Documentation
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                GitHub
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                Community
            </a>
        </nav>
    </div>
@endsection

{{-- Page-specific JavaScript --}}
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Example page loaded!');

            // Add some interactive functionality
            const cards = document.querySelectorAll('.bg-white, .bg-gray-800');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.transition = 'transform 0.2s ease-in-out';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
@endsection

{{-- Push additional scripts --}}
@push('scripts')
    <script>
        // This script will be added to the scripts stack
        console.log('Script pushed to stack');
    </script>
@endpush

{{-- Using component-based layout --}}
<x-layout>
    {{-- Setting attributes for the layout component --}}
    <x-slot:title>Component Layout Example - Laravel</x-slot:title>
    <x-slot:description>Learn how to use Laravel's component-based layouts for modern web development</x-slot:description>

    {{-- Custom header --}}
    <x-slot:header>
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Component-Based Layouts
                </h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">
                    Modern Laravel approach using Blade components
                </p>
            </div>
            <div class="flex space-x-3">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    Get Started
                </button>
                <button class="border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 px-4 py-2 rounded-lg transition duration-200">
                    Learn More
                </button>
            </div>
        </div>
    </x-slot:header>

    {{-- Main content --}}
    <div class="space-y-8">
        {{-- Hero Section --}}
        <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg p-8 text-white">
            <h2 class="text-3xl font-bold mb-4">Welcome to Component Layouts!</h2>
            <p class="text-xl opacity-90 mb-6">
                This demonstrates Laravel's modern component-based layout system,
                which offers more flexibility and cleaner syntax compared to traditional @extends/@section approach.
            </p>
            <div class="flex space-x-4">
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">Laravel 12</span>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">Blade Components</span>
                <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm">Modern Syntax</span>
            </div>
        </div>

        {{-- Comparison Section --}}
        <div class="grid lg:grid-cols-2 gap-8">
            {{-- Traditional Approach --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Traditional Layout</h3>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-4">
                    <pre class="text-sm text-gray-700 dark:text-gray-300"><code>{{-- layouts/app.blade.php --}}
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;@yield('title')&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    @yield('content')
  &lt;/body&gt;
&lt;/html&gt;

{{-- pages/example.blade.php --}}
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
  &lt;h1&gt;Content here&lt;/h1&gt;
@endsection</code></pre>
                </div>
                <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                    <li>• Uses @extends and @section</li>
                    <li>• Template inheritance model</li>
                    <li>• Less flexible for dynamic content</li>
                    <li>• Requires @yield in layout</li>
                </ul>
            </div>

            {{-- Component Approach --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border-2 border-indigo-200 dark:border-indigo-700">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-indigo-600">Component Layout</h3>
                    <span class="ml-auto bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">Recommended</span>
                </div>
                <div class="bg-indigo-50 dark:bg-indigo-900 dark:bg-opacity-20 rounded-lg p-4 mb-4">
                    <pre class="text-sm text-gray-700 dark:text-gray-300"><code>{{-- components/layout.blade.php --}}
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;{{ $title }}&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    {{ $slot }}
  &lt;/body&gt;
&lt;/html&gt;

{{-- pages/example.blade.php --}}
&lt;x-layout&gt;
  &lt;x-slot:title&gt;Page Title&lt;/x-slot:title&gt;

  &lt;h1&gt;Content here&lt;/h1&gt;
&lt;/x-layout&gt;</code></pre>
                </div>
                <ul class="text-sm text-indigo-600 dark:text-indigo-400 space-y-1">
                    <li>• Uses component syntax &lt;x-layout&gt;</li>
                    <li>• More intuitive and readable</li>
                    <li>• Better attribute passing</li>
                    <li>• Easier to customize and extend</li>
                </ul>
            </div>
        </div>

        {{-- Features Section --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Component Layout Features</h3>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Named Slots</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Use named slots for multiple content areas:
                        <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">&lt;x-slot:name&gt;</code>
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Dynamic Attributes</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Pass data as attributes and access them in the component as variables
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M15 5v2M15 11v2M15 17v2"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Conditional Content</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Use <code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">@isset</code> to conditionally render sections
                    </p>
                </div>
            </div>
        </div>

        {{-- Code Example --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">This Page's Code</h3>

            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-6 overflow-x-auto">
                <pre class="text-sm text-gray-700 dark:text-gray-300"><code>&lt;x-layout&gt;
    {{-- Setting component attributes --}}
    &lt;x-slot:title&gt;Component Layout Example - Laravel&lt;/x-slot:title&gt;
    &lt;x-slot:description&gt;Learn how to use Laravel's component-based layouts&lt;/x-slot:description&gt;

    {{-- Custom header slot --}}
    &lt;x-slot:header&gt;
        &lt;div class="flex justify-between items-center"&gt;
            &lt;h1 class="text-3xl font-bold"&gt;Component-Based Layouts&lt;/h1&gt;
            &lt;button class="bg-indigo-600 text-white px-4 py-2 rounded"&gt;
                Get Started
            &lt;/button&gt;
        &lt;/div&gt;
    &lt;/x-slot:header&gt;

    {{-- Main content goes directly here (in the $slot) --}}
    &lt;div class="space-y-8"&gt;
        &lt;h2&gt;Your content here...&lt;/h2&gt;
    &lt;/div&gt;

    {{-- Additional scripts --}}
    &lt;x-slot:scripts&gt;
        &lt;script&gt;console.log('Page loaded!');&lt;/script&gt;
    &lt;/x-slot:scripts&gt;
&lt;/x-layout&gt;</code></pre>
            </div>
        </div>

        {{-- Benefits Section --}}
        <div class="bg-gradient-to-r from-green-400 to-blue-500 rounded-lg p-8 text-white">
            <h3 class="text-2xl font-bold mb-6">Why Use Component Layouts?</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-semibold mb-3">Developer Experience</h4>
                    <ul class="space-y-2 text-green-100">
                        <li>• More intuitive syntax</li>
                        <li>• Better IDE support and autocomplete</li>
                        <li>• Easier to understand and maintain</li>
                        <li>• Less boilerplate code</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-3">Flexibility</h4>
                    <ul class="space-y-2 text-blue-100">
                        <li>• Dynamic attribute passing</li>
                        <li>• Conditional content rendering</li>
                        <li>• Multiple named slots</li>
                        <li>• Better component composition</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom scripts slot --}}
    <x-slot:scripts>
        <script>
            console.log('Component layout example loaded!');

            // Add some interactive behavior
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('button');
                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        this.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            this.style.transform = 'scale(1)';
                        }, 150);
                    });
                });
            });
        </script>
    </x-slot:scripts>
</x-layout>

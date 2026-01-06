{{-- Extending the simple layout --}}
@extends('layouts.simple')

{{-- Setting the page title --}}
@section('title', 'Simple Example - Laravel Layouts')

{{-- Setting the page header title --}}
@section('page-title', 'Simple Layout Example')

{{-- Custom navigation for this page --}}
@section('navigation')
    <a href="/" class="hover:underline mr-4">Home</a>
    <a href="/example" class="hover:underline mr-4 font-bold">Simple Example</a>
    <a href="/advanced" class="hover:underline mr-4">Advanced Example</a>
    <a href="/contact" class="hover:underline">Contact</a>
@endsection

{{-- Main content --}}
@section('content')
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Understanding Laravel Layouts</h2>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">What are Laravel Layouts?</h3>
            <p class="text-gray-600 mb-4">
                Laravel layouts allow you to create a common structure for your web pages.
                Instead of repeating HTML code like headers, navigation, and footers on every page,
                you define them once in a layout file and then extend that layout in your individual pages.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-lg font-semibold text-blue-600 mb-3">Benefits of Using Layouts</h4>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Code reusability and DRY principle</li>
                    <li>Consistent design across all pages</li>
                    <li>Easy maintenance and updates</li>
                    <li>Better organization of your views</li>
                    <li>Flexible content sections</li>
                </ul>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h4 class="text-lg font-semibold text-green-600 mb-3">Key Blade Directives</h4>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li><code class="bg-gray-100 px-2 py-1 rounded">@extends</code> - Inherit from layout</li>
                    <li><code class="bg-gray-100 px-2 py-1 rounded">@section</code> - Define content area</li>
                    <li><code class="bg-gray-100 px-2 py-1 rounded">@yield</code> - Output section content</li>
                    <li><code class="bg-gray-100 px-2 py-1 rounded">@endsection</code> - End section</li>
                    <li><code class="bg-gray-100 px-2 py-1 rounded">@parent</code> - Include parent content</li>
                </ul>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">How This Page Works</h3>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-gray-700 mb-3">This page demonstrates how layouts work:</p>
                <ol class="list-decimal list-inside text-gray-600 space-y-2">
                    <li>It extends <code class="bg-gray-200 px-2 py-1 rounded">layouts.simple</code></li>
                    <li>It defines a custom title using <code class="bg-gray-200 px-2 py-1 rounded">@section('title')</code></li>
                    <li>It sets a page header with <code class="bg-gray-200 px-2 py-1 rounded">@section('page-title')</code></li>
                    <li>It customizes navigation using <code class="bg-gray-200 px-2 py-1 rounded">@section('navigation')</code></li>
                    <li>The main content is defined in <code class="bg-gray-200 px-2 py-1 rounded">@section('content')</code></li>
                </ol>
            </div>
        </div>

        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        <strong>Pro Tip:</strong> You can override any section from the parent layout by defining it in your child view.
                        If you want to append to the parent content instead of replacing it, use <code class="bg-blue-200 px-2 py-1 rounded">@parent</code> within your section.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Next Steps</h3>
            <p class="text-gray-600 mb-4">
                Now that you understand the basics, try creating your own layouts and pages.
                You can also explore more advanced features like:
            </p>
            <ul class="list-disc list-inside text-gray-600 space-y-1 mb-4">
                <li>Nested layouts</li>
                <li>Blade components</li>
                <li>Including sub-views</li>
                <li>Conditional sections</li>
                <li>Layout inheritance chains</li>
            </ul>
            <a href="#" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Learn More
            </a>
        </div>
    </div>
@endsection

{{-- Additional head content --}}
@section('head')
    <meta name="description" content="Learn how Laravel layouts work with this simple example demonstrating Blade templating concepts.">
@endsection

{{-- Page-specific JavaScript --}}
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Simple example page loaded!');

            // Add smooth scrolling to any anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
@endsection

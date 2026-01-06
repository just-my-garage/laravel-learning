# Laravel Layouts Guide

This guide explains how layouts work in Laravel, covering both traditional template inheritance and modern component-based approaches.

## Table of Contents

1. [What are Layouts?](#what-are-layouts)
2. [Traditional Template Inheritance](#traditional-template-inheritance)
3. [Modern Component-Based Layouts](#modern-component-based-layouts)
4. [Comparison: Traditional vs Component](#comparison-traditional-vs-component)
5. [Advanced Techniques](#advanced-techniques)
6. [Best Practices](#best-practices)
7. [Examples in This Project](#examples-in-this-project)

## What are Layouts?

Layouts in Laravel allow you to create reusable templates that define the common structure of your web pages. Instead of repeating HTML code like headers, navigation, footers, and meta tags on every page, you define them once in a layout and then extend or use that layout in your individual pages.

### Benefits of Using Layouts

- **DRY Principle**: Don't Repeat Yourself - write common HTML once
- **Consistency**: Ensures uniform design across all pages
- **Maintainability**: Update layout once, affects all pages
- **Organization**: Better separation of concerns
- **Flexibility**: Easy to customize specific sections per page

## Traditional Template Inheritance

The traditional approach uses Blade's `@extends` and `@section` directives.

### Basic Structure

**Layout File (`resources/views/layouts/app.blade.php`):**
```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <nav>
        <!-- Navigation content -->
        @yield('navigation')
    </nav>

    @hasSection('header')
        <header>
            @yield('header')
        </header>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
```

**Page File (`resources/views/pages/example.blade.php`):**
```php
@extends('layouts.app')

@section('title', 'Example Page')

@section('header')
    <h1>Welcome to Example Page</h1>
@endsection

@section('content')
    <div class="container">
        <p>This is the main content area.</p>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/css/custom.css">
@endpush

@section('scripts')
    <script>
        console.log('Page loaded');
    </script>
@endsection
```

### Key Directives

- `@extends('layout.name')` - Inherits from a parent layout
- `@section('name')...@endsection` - Defines content for a section
- `@section('name', 'value')` - Shorthand for simple content
- `@yield('name', 'default')` - Outputs section content in layout
- `@hasSection('name')` - Checks if section has content
- `@stack('name')` - Outputs stacked content
- `@push('name')...@endpush` - Adds content to a stack
- `@parent` - Includes parent section content

## Modern Component-Based Layouts

Laravel's modern approach uses Blade components for more intuitive and flexible layouts.

### Basic Structure

**Layout Component (`resources/views/components/layout.blade.php`):**
```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $styles ?? '' }}
</head>
<body>
    @isset($navigation)
        {{ $navigation }}
    @else
        <nav>
            <!-- Default navigation -->
        </nav>
    @endisset

    @isset($header)
        <header>
            {{ $header }}
        </header>
    @endif

    <main>
        {{ $slot }}
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    {{ $scripts ?? '' }}
</body>
</html>
```

**Page File:**
```php
<x-layout>
    <x-slot:title>Example Page</x-slot:title>

    <x-slot:header>
        <h1>Welcome to Example Page</h1>
    </x-slot:header>

    <x-slot:styles>
        <link rel="stylesheet" href="/css/custom.css">
    </x-slot:styles>

    <!-- Main content goes here (in the $slot) -->
    <div class="container">
        <p>This is the main content area.</p>
    </div>

    <x-slot:scripts>
        <script>
            console.log('Page loaded');
        </script>
    </x-slot:scripts>
</x-layout>
```

### Key Features

- `<x-layout>` - Uses the layout component
- `<x-slot:name>` - Named slots for specific content areas
- `{{ $slot }}` - Default slot for main content
- `{{ $variable }}` - Access passed attributes
- `@isset($slot)` - Check if slot has content
- Attributes can be passed as props

## Comparison: Traditional vs Component

| Feature | Traditional (@extends) | Component (<x-layout>) |
|---------|----------------------|----------------------|
| **Syntax** | `@extends('layouts.app')` | `<x-layout>` |
| **Content Areas** | `@section('name')...@endsection` | `<x-slot:name>...</x-slot:name>` |
| **Main Content** | `@section('content')` | Direct in `{{ $slot }}` |
| **Data Passing** | Global variables, `@section` | Attributes and slots |
| **Conditional Sections** | `@hasSection('name')` | `@isset($slotName)` |
| **Readability** | Less intuitive | More intuitive |
| **IDE Support** | Limited | Better autocomplete |
| **Flexibility** | Good | Excellent |
| **Learning Curve** | Steeper | Gentler |

## Advanced Techniques

### Nested Layouts

You can create nested layouts for different sections of your application:

```php
{{-- layouts/app.blade.php (main layout) --}}
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @yield('body')
</body>
</html>

{{-- layouts/admin.blade.php (admin-specific layout) --}}
@extends('layouts.app')

@section('body')
    <div class="admin-layout">
        <aside>
            {{-- Admin sidebar --}}
        </aside>
        <main>
            @yield('content')
        </main>
    </div>
@endsection

{{-- pages/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h1>Admin Dashboard</h1>
@endsection
```

### Layout with Multiple Content Areas

```php
{{-- Layout with multiple areas --}}
<div class="page-layout">
    <aside class="sidebar">
        {{ $sidebar ?? 'Default sidebar' }}
    </aside>
    
    <div class="main-area">
        <header>
            {{ $header }}
        </header>
        
        <main>
            {{ $slot }}
        </main>
        
        @isset($aside)
            <aside class="secondary">
                {{ $aside }}
            </aside>
        @endif
    </div>
</div>
```

### Dynamic Layout Selection

```php
{{-- In your controller --}}
class PageController extends Controller
{
    public function show($page)
    {
        $layout = $page->layout ?? 'layouts.app';
        
        return view('pages.dynamic', compact('page'))
            ->extends($layout);
    }
}
```

### Layout with Props Validation

```php
<?php
// app/View/Components/Layout.php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    public $title;
    public $description;
    public $showSidebar;

    public function __construct($title = null, $description = null, $showSidebar = true)
    {
        $this->title = $title;
        $this->description = $description;
        $this->showSidebar = $showSidebar;
    }

    public function render()
    {
        return view('components.layout');
    }
}
```

## Best Practices

### 1. Choose the Right Approach

- **Use Components** for new projects and modern codebases
- **Use Traditional** when working with existing legacy code
- **Be Consistent** within the same project

### 2. Organization

```
resources/views/
├── components/           # Blade components
│   ├── layout.blade.php
│   ├── card.blade.php
│   └── button.blade.php
├── layouts/             # Traditional layouts
│   ├── app.blade.php
│   ├── admin.blade.php
│   └── guest.blade.php
└── pages/              # Page views
    ├── home.blade.php
    └── about.blade.php
```

### 3. Performance Considerations

- Use `@once` directive for scripts that should only load once
- Leverage `@stack` and `@push` for conditional assets
- Consider view caching for production environments

### 4. SEO and Meta Tags

```php
{{-- In your layout --}}
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? 'Default description' }}">
    <meta name="keywords" content="{{ $keywords ?? 'laravel, web, application' }}">
    
    {{-- Open Graph tags --}}
    <meta property="og:title" content="{{ $title ?? config('app.name') }}">
    <meta property="og:description" content="{{ $description ?? 'Default description' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/default-og.png') }}">
</head>
```

### 5. Error Handling

```php
{{-- Include error handling in your layouts --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

## Examples in This Project

This project contains several layout examples:

1. **`resources/views/layouts/app.blade.php`**
   - Comprehensive traditional layout with all features
   - Shows navigation, header, flash messages, footer
   - Demonstrates `@yield`, `@stack`, and conditional sections

2. **`resources/views/layouts/simple.blade.php`**
   - Minimal traditional layout for quick prototyping
   - Basic structure with essential elements

3. **`resources/views/components/layout.blade.php`**
   - Modern component-based layout
   - Shows named slots, conditional rendering, and attribute passing

4. **`resources/views/pages/example.blade.php`**
   - Comprehensive example using traditional layout
   - Demonstrates all major features and techniques

5. **`resources/views/pages/simple-example.blade.php`**
   - Simple example for beginners
   - Clear demonstration of basic concepts

6. **`resources/views/pages/component-example.blade.php`**
   - Modern component-based example
   - Shows the advantages of the component approach

## Next Steps

1. **Try the Examples**: Look at the example files in this project
2. **Create Your Own**: Start with simple layouts and gradually add features
3. **Read the Documentation**: Check Laravel's official documentation for more details
4. **Practice**: Build different types of layouts for various use cases
5. **Explore Components**: Learn about other Blade component features

## Resources

- [Laravel Blade Documentation](https://laravel.com/docs/blade)
- [Laravel Components Documentation](https://laravel.com/docs/blade#components)
- [Laravel Views Documentation](https://laravel.com/docs/views)
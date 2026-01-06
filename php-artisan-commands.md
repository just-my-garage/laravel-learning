```bash
php artisan make:model [name] [-mrc]
php artisan make:controller [name] [--resource]
php artisan make:provider 
```

When making components in `laravel`, you define the props of a specific components
```javascript bcuz php doesn't work in .md
@props(['add', 'your', 'props', 'here'])
```

Whatever is the name of your component like
```bash
example.blade.php
```
when defining it on another page or component is should be like
```php
<x-example :add="$add" />
```

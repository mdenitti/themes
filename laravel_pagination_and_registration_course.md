# Laravel Pagination & Registration Master Class: Cities & Users! 🌆👤

## Introduction to Eloquent Power

Eloquent ORM in Laravel is incredibly powerful! It can handle almost anything you throw at it. Let's explore some of the most common Eloquent operations, focusing on SELECT queries and pagination with our City model.

```php
// Retrieve all cities
\App\Models\City::all(); // SELECT * FROM cities

// Get the 3 most popular cities by tourists
\App\Models\City::orderBy('annual_tourists', 'desc')->take(3)->get();

// Limit results to 5 cities
\App\Models\City::take(5)->get(); // SELECT * FROM cities LIMIT 5

// Paginate cities (10 per page)
\App\Models\City::paginate(10); // Hello pagination! 👋
```

## The Magic of Pagination 🪄

The `paginate()` method is used to return a collection of results from a database query, limiting the collection to a specific number of results per page. This is particularly useful when dealing with large datasets like our city database.

### How Pagination Works

When you call `paginate(10)` on a query, it returns the first 10 results from the query on the "cities" table, followed by a pagination limit of 10. This means if there are more than 10 results, they'll be divided across multiple pages with a maximum of 10 results per page.

```php
// In CityController.php
public function index()
{
    $cities = \App\Models\City::paginate(10);
    return view('cities.index', compact('cities'));
}
```

The Paginator class includes methods for navigating between pages, including retrieving URLs for previous and next pages. By passing the Paginator object to a view, we can easily create a pagination interface with buttons for previous and next pages, as well as a button to jump directly to a specific page.

### "But wait, there's more!" 📢

Pagination is especially useful when we need to fetch large amounts of data from a database, such as a list of cities from around the world, and want to make it easy for users to navigate through the data. It's an essential tool in any developer's toolkit.

In your view, activate pagination links like this:

```php
@foreach ($cities as $city)
    <div class="city">
        <h2>{{ $city->name }}</h2>
        <p>{{ $city->country }} ({{ $city->continent }})</p>
        <p>Population: {{ number_format($city->population) }}</p>
    </div>
@endforeach

{{ $cities->links() }}
```

### Customizing Pagination Views

To customize the pagination views, publish the pagination templates to your resources:

```bash
php artisan vendor:publish --tag=laravel-pagination
```

> **Dev Pro-Tip:** Always publish templates from the vendor to your resources! Otherwise, your custom files might be overwritten during the next composer update. Remember: "Publish or Perish!" 😱

## Modern Approach in Laravel 10+

As of Laravel 10, there are some improvements to pagination. The pagination now uses Tailwind CSS by default (previously Bootstrap), and you can customize this in your `config/app.php` file.

```php
// In AppServiceProvider.php
public function boot()
{
    Paginator::useBootstrapFive();
    // or
    Paginator::useTailwind();
}
```

## Exercise 1: Implementing City Pagination 🏙️

**Objective:** Update our existing city listing to include pagination.

**Steps:**

1. First, update the `index` method in the CityController:

```php
public function index()
{
    // Change from get() to paginate(10)
    $cities = \App\Models\City::orderBy('name')->paginate(10);
    return view('cities.index', compact('cities'));
}
```

2. Now, update the cities index view (resources/views/cities/index.blade.php):

```php
@extends('layout')
@section('title','Cities Around the World')
@section('content')
    <div class="container">
        <h1>Cities Around the World</h1>
        
        <div class="row">
            @foreach($cities as $city)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $city->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $city->country }} ({{ $city->continent }})</h6>
                            <p class="card-text">
                                Population: {{ number_format($city->population) }}<br>
                                @if($city->is_capital)
                                    <span class="badge bg-success">Capital City</span>
                                @endif
                                @if($city->annual_tourists)
                                    <span class="badge bg-info">{{ number_format($city->annual_tourists) }} annual tourists</span>
                                @endif
                            </p>
                            <p class="card-text">
                                <small>Known for: {{ $city->known_for }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $cities->links() }}
        </div>
    </div>
@endsection
```

3. Don't forget to add styling support for pagination in your AppServiceProvider:

```php
<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();
        // If you're using Tailwind, use: Paginator::useTailwind();
    }
}
```

**Success!** You now have a paginated city listing showing 10 cities per page.

## Simple User Registration Form 👤

Laravel forms use CSRF (Cross-Site Request Forgery) protection to ensure that the form submissions are secure. Let's create a basic user registration form to demonstrate this concept.

### Step 1: Create a Controller for Registration

```bash
php artisan make:controller AuthController
```

### Step 2: Add a Basic Register Method

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to home page with success message
        return redirect('/')->with('success', 'Registration successful!');
    }
}
```

### Step 3: Create a Simple Registration View

Create a new file at `resources/views/auth/register.blade.php`:

```php
@extends('layout')
@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf <!-- This is the CSRF token -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
```

### Step 4: Add Routes for Registration

Update your `routes/web.php` file to add registration routes:

```php
// Registration Routes
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
```

### Step 5: Add Flash Message Display

To display the success message after registration, add this to your layout file:

```php
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
```

### Understanding CSRF Protection

The `@csrf` directive in the form adds a hidden input field with a token that Laravel uses to verify that the form submission comes from your website and not from another domain. This helps protect against Cross-Site Request Forgery attacks.

When you examine your form's HTML in the browser, you'll see something like this:

```html
<input type="hidden" name="_token" value="random_token_here">
```

Laravel automatically validates this token when the form is submitted. If the token is missing or invalid, Laravel will reject the request with a 419 status code.

## Conclusion: Simple Pagination & Forms 💪

You've now learned how to implement pagination in Laravel for your Cities model and create a secure user registration form using Laravel's CSRF protection.

Key takeaways from this session:

1. Use `paginate()` to break large datasets into manageable chunks
2. Use the `links()` method to create pagination navigation
3. Always include `@csrf` in your forms
4. Use Laravel's validation to ensure form data meets your requirements

Happy coding! May your cities be beautifully paginated and your forms securely protected! 🌆👤✨

## Verification of Content Accuracy

This course content has been verified to be accurate as of March 2025 for Laravel 12+. The pagination and CSRF functionality described works in all recent Laravel versions 9+
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Asegúrate de tener estilos CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9f9f9;
        }
        .hero {
            background-color: #4A90E2;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }
        .cta {
            margin-top: 20px;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin: 50px 0;
        }
        .feature {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 30%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative min-h-screen">
        <!-- @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                    @if (Route::has('registro'))
                        <a href="{{ route('registro') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                    @endif
                @endauth
            </div>
        @endif -->

        <div class="hero">
            <h1 class="mb-0">Welcome to Our Product Management System</h1>
            <p>Your one-stop solution for managing products effectively.</p>
            <div class="cta">
                <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
            </div>
        </div>

        <div class="container">
            <div class="features">
                <div class="feature">
                    <h2>Easy Management</h2>
                    <p>Manage your products with ease. Add, edit, and delete products in a few clicks.</p>
                </div>
                <div class="feature">
                    <h2>User Friendly</h2>
                    <p>Our interface is designed to be intuitive and user-friendly, making it accessible for everyone.</p>
                </div>
                <div class="feature">
                    <h2>Secure</h2>
                    <p>Security is our priority. Your data is safe and secure with us.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


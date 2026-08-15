<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elite Motors | Access') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        kanit: ['Kanit', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Kanit', sans-serif; }
        .btn-kia {
            background-color: #050b16;
            color: white;
            padding: 12px 30px;
            border-radius: 0;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.1em;
            transition: all 0.3s;
            border: 2px solid #050b16;
        }
        .btn-kia:hover {
            background-color: transparent;
            color: #050b16;
        }
        .form-input {
            border-radius: 0 !important;
            border: 1px solid #e5e7eb !important;
            padding: 12px 16px !important;
            transition: border-color 0.3s;
        }
        .form-input:focus {
            border-color: #050b16 !important;
            ring: 0 !important;
            outline: none !important;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex">
        <!-- Left Side: Visual -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1621135802920-133df287f89c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
            <div class="relative z-10 flex flex-col justify-end p-20 text-white">
                <h2 class="text-6xl font-bold tracking-tighter mb-4 italic uppercase">Excellence in every drive</h2>
                <p class="text-xl text-gray-300 max-w-md font-light">The ultimate multibrand destination for high-performance vehicles.</p>
            </div>

        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
            <div class="max-w-md w-full">
                <div class="mb-12 text-center lg:text-left">
                    <a href="/" class="text-4xl font-extrabold tracking-tighter text-gray-900 block mb-8">
                        ELITE MOTORS
                    </a>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2 uppercase tracking-wide">Welcome Back</h1>
                    <p class="text-gray-500">Please enter your credentials to access your account.</p>
                </div>

                <div class="space-y-6">
                    {{ $slot }}
                </div>

                <div class="mt-12 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} Elite Motors Dealership. All rights reserved.
                </div>

            </div>
        </div>
    </div>
</body>
</html>

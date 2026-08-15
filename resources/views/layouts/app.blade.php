<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Elite Motors') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
            .btn-elite {
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
            .btn-elite:hover {
                background-color: transparent;
                color: #050b16;
            }
            .form-elite-input {
                border-radius: 0 !important;
                border: 1px solid #e5e7eb !important;
                padding: 12px 16px !important;
                transition: border-color 0.3s;
                width: 100%;
            }
            .form-elite-input:focus {
                border-color: #050b16 !important;
                ring: 0 !important;
                outline: none !important;
            }
            .card-elite {
                background: white;
                border: 1px solid #f3f4f6;
                box-shadow: 0 10px 30px -15px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body class="bg-[#fafafa] antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

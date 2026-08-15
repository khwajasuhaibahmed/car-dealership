<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Elite Motors Dealership'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
        }
        .nav-link {
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #050b16 !important;
            border-bottom: 2px solid #050b16;
        }
        .btn-kia {
            background-color: #050b16;
            color: white;
            padding: 10px 24px;
            border-radius: 0;
            text-transform: uppercase;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-kia:hover {
            background-color: #2b3a4a;
            color: white;
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="glass-nav sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-3xl font-bold tracking-tighter text-gray-900">
                            ELITE MOTORS
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="{{ route('home') }}" class="nav-link text-gray-600 font-medium py-2">HOME</a>
                        @auth
                            <a href="{{ route('inventory.index') }}" class="nav-link text-gray-600 font-medium py-2">INVENTORY</a>
                        @endauth
                        <a href="{{ route('about') }}" class="nav-link text-gray-600 font-medium py-2">ABOUT US</a>
                        <a href="{{ route('contact') }}" class="nav-link text-gray-600 font-medium py-2">CONTACT</a>
                        
                        @if (Route::has('login'))
                            <div class="flex items-center space-x-4 ml-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn-kia text-sm">DASHBOARD</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-black font-medium">LOG IN</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn-kia text-sm">REGISTER</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white pt-16 pb-8 border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-2xl font-bold mb-6 tracking-tighter">ELITE MOTORS</h3>
                        <p class="text-gray-400 leading-relaxed">Defining excellence in motion. Providing the finest selection of multi-brand vehicles for the discerning driver.</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                        <ul class="space-y-4">
                            @auth
                                <li><a href="{{ route('inventory.index') }}" class="text-gray-400 hover:text-white transition">Vehicles</a></li>
                            @endauth
                            <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Showroom</h4>
                        <ul class="space-y-4 text-gray-400">
                            <li>Mon - Sat: 9:00 AM - 7:00 PM</li>
                            <li>Sunday: Closed</li>
                            <li>Location: Main KIA Avenue, Karachi</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-6">Follow Us</h4>
                        <div class="flex space-x-4">
                            <!-- Social Icons -->
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                    <p>&copy; {{ date('Y') }} Elite Motors Dealership. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#050b16'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonColor: '#050b16'
        });
    </script>
    @endif
</body>
</html>

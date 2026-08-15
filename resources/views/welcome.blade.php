@extends('layouts.public')

@section('title', 'Welcome to Elite Motors | Multi-Brand Premium Dealership')

@section('content')
<!-- Hero Section -->
<div class="relative h-[90vh] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1621135802920-133df287f89c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Kia Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-transparent"></div>
    </div>
    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
        <div class="max-w-2xl text-white">
            <h1 class="text-6xl md:text-8xl font-bold tracking-tighter mb-6 leading-tight">EXCELLENCE IN EVERY DRIVE</h1>
            <p class="text-xl md:text-2xl mb-10 text-gray-200">Discover your dream car from our elite collection of Honda, Toyota, Suzuki, and Kia vehicles.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                @auth
                    <a href="{{ route('inventory.index') }}" class="btn-kia px-12 py-5 text-lg text-center">Explore Inventory</a>
                @else
                    <a href="{{ route('login') }}" class="btn-kia px-12 py-5 text-lg text-center">Login to Explore</a>
                @endauth
                <a href="{{ route('contact') }}" class="px-12 py-5 bg-white text-black font-bold uppercase tracking-wider hover:bg-gray-100 transition text-center">Book a Test Drive</a>
            </div>

        </div>
    </div>
</div>





<!-- Newsletter -->
<div class="bg-white py-24 border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4 tracking-tight">STAY UPDATED</h2>
        <p class="text-gray-500 mb-10">Join our mailing list to receive the latest updates, special offers and automotive news.</p>
        <form class="flex flex-col sm:flex-row gap-0 shadow-xl overflow-hidden">
            <input type="email" placeholder="Enter your email address" class="flex-grow p-5 border-2 border-gray-900 focus:outline-none placeholder:text-gray-400">
            <button type="submit" class="bg-gray-900 text-white px-10 py-5 font-bold uppercase hover:bg-black transition">Subscribe</button>
        </form>
    </div>
</div>
@endsection

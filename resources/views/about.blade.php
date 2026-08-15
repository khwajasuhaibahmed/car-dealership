@extends('layouts.public')

@section('title', 'About Us | Elite Motors Dealership')

@section('content')
<div class="bg-gray-950 text-white py-32 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
        <h1 class="text-7xl md:text-9xl font-extrabold tracking-tighter mb-8 italic opacity-20 absolute -top-10 left-10 select-none">ELITE MOTORS</h1>
        <h2 class="text-5xl md:text-7xl font-bold tracking-tight mb-6">EXCELLENCE IN<br><span class="text-red-600">MOTION</span></h2>
        <p class="max-w-3xl mx-auto text-xl text-gray-400 font-light leading-relaxed">
            Elite Motors is your premier multibrand dealership, committed to bringing the world's most trusted automotive brands to your doorstep with unparalleled service.
        </p>
    </div>
</div>

<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center mb-32">
            <div>
                <span class="text-red-600 font-bold tracking-widest uppercase mb-4 block">Our Showroom</span>
                <h3 class="text-4xl font-bold tracking-tighter mb-8">GLOBAL BRANDS, LOCAL TRUST</h3>
                <p class="text-gray-500 text-lg leading-relaxed mb-8">
                    We specialize in a diverse range of vehicles, from the sporty Honda Civic and robust Toyota Corolla to the fuel-efficient Suzuki Swift and innovative Kia lineup.
                </p>
                <p class="text-gray-500 text-lg leading-relaxed">
                    Our team is dedicated to helping you find the perfect vehicle that matches your lifestyle and budget, ensuring a transparent and smooth buying experience.
                </p>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1621135802920-133df287f89c?auto=format&fit=crop&w=1200&q=80" class="w-full h-96 object-cover rounded-lg shadow-2xl">
            </div>

        </div>

        <div class="bg-gray-50 p-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 text-center">
                <div>
                    <span class="text-5xl font-extrabold text-gray-900 mb-4 block">75+</span>
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Years of History</h4>
                </div>
                <div>
                    <span class="text-5xl font-extrabold text-gray-900 mb-4 block">180K</span>
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Global Employees</h4>
                </div>
                <div>
                    <span class="text-5xl font-extrabold text-gray-900 mb-4 block">190+</span>
                    <h4 class="text-sm font-bold text-gray-400 uppercase tracking-[0.2em]">Markets Worldwide</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-24 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-16 tracking-tighter">OUR GUIDING PRINCIPLES</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="p-10 border border-white/10 hover:border-red-600 transition duration-500 group">
                <div class="h-1 w-12 bg-red-600 mb-8 mx-auto group-hover:w-full transition-all"></div>
                <h3 class="text-xl font-bold mb-4">INNOVATION</h3>
                <p class="text-gray-500">Constantly seeking new ways to improve the driving experience through technology.</p>
            </div>
            <div class="p-10 border border-white/10 hover:border-red-600 transition duration-500 group">
                <div class="h-1 w-12 bg-red-600 mb-8 mx-auto group-hover:w-full transition-all"></div>
                <h3 class="text-xl font-bold mb-4">QUALITY</h3>
                <p class="text-gray-500">Uncompromising commitment to build cars that stand the test of time.</p>
            </div>
            <div class="p-10 border border-white/10 hover:border-red-600 transition duration-500 group">
                <div class="h-1 w-12 bg-red-600 mb-8 mx-auto group-hover:w-full transition-all"></div>
                <h3 class="text-xl font-bold mb-4">SUSTAINABILITY</h3>
                <p class="text-gray-500">Leading the transition to electric vehicles and eco-friendly manufacturing.</p>
            </div>
        </div>
    </div>
</div>
@endsection

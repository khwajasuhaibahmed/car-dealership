@extends('layouts.public')

@section('title', $car->title . ' | Kia Motors')

@section('content')
<div class="bg-white">
    <!-- Breadcrumb & Title -->
    <div class="bg-gray-50 py-10 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <nav class="flex text-sm text-gray-500 mb-4 font-medium uppercase tracking-widest">
                        <a href="{{ route('home') }}" class="hover:text-black">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('inventory.index') }}" class="hover:text-black">Inventory</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-900">{{ $car->brand }} {{ $car->model }}</span>
                    </nav>
                    <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-gray-900">{{ $car->brand }} {{ $car->model }} <span class="text-gray-400 font-light">{{ $car->year }}</span></h1>
                </div>
                <div class="text-left md:text-right">
                    <p class="text-sm font-bold text-gray-500 uppercase mb-1">MSRP Starting At</p>
                    <p class="text-4xl font-bold text-red-600">Rs. {{ number_format($car->price) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery & Specs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Left Side: Gallery & Description -->
            <div class="lg:col-span-8">
                <!-- Main Image -->
                <div class="mb-8 overflow-hidden bg-gray-100">
                    @php 
                        $images = $car->images ?? []; 
                        $firstImage = (is_array($images) && count($images) > 0) ? $images[0] : null;
                        if ($firstImage) {
                            $mainImageUrl = str_starts_with($firstImage, 'http') ? $firstImage : asset('storage/' . $firstImage);
                        } else {
                            $mainImageUrl = 'https://placehold.co/1200x800/1a1a1a/ffffff?text=No+Photo+Available';
                        }
                    @endphp
                    <img id="main-image" src="{{ $mainImageUrl }}" 
                         class="w-full h-auto object-cover max-h-[600px]" alt="{{ $car->title }}">
                </div>

                
                <!-- Thumbnails -->
                @if(count($images) > 1)
                <div class="flex gap-4 mb-12 overflow-x-auto pb-4">
                    @foreach($images as $img)
                        @if(is_string($img))
                        @php $thumbUrl = str_starts_with($img, 'http') ? $img : asset('storage/' . $img); @endphp
                        <button onclick="document.getElementById('main-image').src='{{ $thumbUrl }}'" class="w-32 h-20 flex-shrink-0 border-2 border-transparent hover:border-red-600 transition">
                            <img src="{{ $thumbUrl }}" class="w-full h-full object-cover">
                        </button>
                        @endif
                    @endforeach
                </div>
                @endif



                <div class="prose prose-lg max-w-none">
                    <h2 class="text-3xl font-bold mb-6 border-b-2 border-black inline-block pb-2">VEHICLE OVERVIEW</h2>
                    <p class="text-gray-600 leading-relaxed text-lg">{{ $car->description }}</p>
                </div>

                <div class="mt-16 bg-gray-50 p-10">
                    <h3 class="text-2xl font-bold mb-8">TECHNICAL SPECIFICATIONS</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-6">
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Mileage</span>
                            <span class="text-xl font-bold">{{ number_format($car->mileage) }} KM</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Fuel Type</span>
                            <span class="text-xl font-bold">{{ $car->fuel_type }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Transmission</span>
                            <span class="text-xl font-bold">{{ $car->transmission }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Body Type</span>
                            <span class="text-xl font-bold">{{ $car->body_type }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Exterior Color</span>
                            <span class="text-xl font-bold capitalize">{{ $car->color }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500 text-xs font-bold uppercase tracking-wider mb-2">Status</span>
                            <span class="text-xl font-bold text-green-600 uppercase">{{ $car->status }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Inquiry Form -->
            <div class="lg:col-span-4">
                <div class="sticky top-32">
                    <div class="bg-gray-950 p-8 text-white">
                        <h3 class="text-2xl font-bold mb-6">RESERVE THIS CAR</h3>
                        <p class="text-gray-400 mb-8 text-sm">Fill out the form below and one of our consultants will contact you shortly to arrange a viewing or test drive.</p>
                        
                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            
                            <div>
                                <input type="text" name="name" placeholder="FULL NAME" required 
                                    class="w-full bg-white/10 border-white/20 p-4 text-white placeholder:text-gray-500 focus:bg-white focus:text-black transition">
                            </div>
                            
                            <div>
                                <input type="email" name="email" placeholder="EMAIL ADDRESS" required 
                                    class="w-full bg-white/10 border-white/20 p-4 text-white placeholder:text-gray-500 focus:bg-white focus:text-black transition">
                            </div>

                            <div>
                                <input type="text" name="phone" placeholder="PHONE NUMBER" required 
                                    class="w-full bg-white/10 border-white/20 p-4 text-white placeholder:text-gray-500 focus:bg-white focus:text-black transition">
                            </div>

                            <div>
                                <textarea name="message" rows="4" placeholder="HOW CAN WE HELP YOU?" required 
                                    class="w-full bg-white/10 border-white/20 p-4 text-white placeholder:text-gray-500 focus:bg-white focus:text-black transition"></textarea>
                            </div>

                            <button type="submit" class="w-full py-5 bg-white text-black font-extrabold uppercase tracking-widest hover:bg-red-600 hover:text-white transition-all duration-300">
                                Send Inquiry
                            </button>
                        </form>
                    </div>

                    <div class="mt-8 border border-gray-100 p-8 bg-white">
                        <h4 class="font-bold mb-4 flex items-center gap-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            VISIT SHOWROOM
                        </h4>
                        <p class="text-sm text-gray-600 mb-2">Main Kia Showroom, Block 6 PECHS, Karachi.</p>
                        <p class="text-sm font-bold">(+92) 21 111-111-KIA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

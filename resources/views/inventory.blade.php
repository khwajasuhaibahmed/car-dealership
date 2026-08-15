@extends('layouts.public')

@section('title', 'Inventory | Kia Motors')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-5xl font-bold tracking-tighter text-gray-900">OUR INVENTORY</h1>
            <div class="h-1.5 w-24 bg-red-600 mt-4"></div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar / Filters -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white p-8 shadow-sm border border-gray-100 sticky top-24">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        FILTER SEARCH
                    </h3>
                    
                    <form action="{{ route('inventory.index') }}" method="GET" class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Keyword Search</label>
                            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Brand, model, or year..." class="w-full p-3 bg-gray-50 border-gray-200 focus:ring-black focus:border-black">
                        </div>


                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Max Price (Rs.)</label>
                            <input type="number" name="price_max" value="{{ request('price_max') }}" placeholder="No limit" class="w-full p-3 bg-gray-50 border-gray-200 focus:ring-black focus:border-black">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase mb-2">Fuel Type</label>
                            <select name="fuel_type" class="w-full p-3 bg-gray-50 border-gray-200 focus:ring-black focus:border-black">
                                <option value="">All Types</option>
                                <option value="Petrol" {{ request('fuel_type') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                                <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="Electric" {{ request('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                                <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-kia py-4">Search Inventory</button>
                        <a href="{{ route('inventory.index') }}" class="w-full inline-block text-center py-2 text-sm font-bold text-gray-500 hover:text-black uppercase">Clear All</a>
                    </form>
                </div>
            </div>

            <!-- Main Listing -->
            <div class="w-full lg:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($cars as $car)
                    <div class="group bg-white overflow-hidden transition-all duration-500 hover:shadow-xl border border-gray-100">
                        <div class="relative h-56 overflow-hidden">
                            @php 
                                $images = $car->images ?? []; 
                                $firstImage = (is_array($images) && count($images) > 0) ? $images[0] : null;
                                if ($firstImage) {
                                    $imageUrl = str_starts_with($firstImage, 'http') ? $firstImage : asset('storage/' . $firstImage);
                                } else {
                                    $imageUrl = 'https://placehold.co/800x600/1a1a1a/ffffff?text=No+Photo';
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                            <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-3 py-1 font-bold text-gray-900 border-l-4 border-red-600">
                                Rs. {{ number_format($car->price) }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="text-gray-500 text-sm mb-4">{{ $car->year }} | {{ $car->fuel_type }} | {{ $car->mileage }} km</p>
                            
                            <div class="flex gap-2 mb-6">
                                <span class="bg-gray-100 px-3 py-1 text-[10px] font-bold uppercase rounded">{{ $car->transmission }}</span>
                                <span class="bg-gray-100 px-3 py-1 text-[10px] font-bold uppercase rounded">{{ $car->body_type }}</span>
                            </div>

                            <a href="{{ route('inventory.show', $car->id) }}" class="inline-block text-sm font-bold tracking-tighter text-gray-900 border-b-2 border-black pb-1 hover:text-red-600 hover:border-red-600 transition">
                                VIEW DETAILS →
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-2 text-center py-24 bg-white border-2 border-dashed border-gray-200">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-gray-500 italic text-xl">No vehicles matching your criteria were found.</p>
                        <a href="{{ route('inventory.index') }}" class="mt-4 inline-block font-bold text-red-600 underline">Browse all vehicles</a>
                    </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

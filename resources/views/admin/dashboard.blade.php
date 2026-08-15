@extends('layouts.admin')

@section('header', 'System Overview')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <!-- Stats Cards -->
    <div class="bg-white p-8 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-1">Total Vehicles</p>
            <h3 class="text-4xl font-extrabold text-gray-900">{{ $carsCount }}</h3>
        </div>
        <div class="bg-blue-50 p-4 text-blue-600 rounded-xl">
             <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
    </div>

    <div class="bg-white p-8 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-1">New Inquiries</p>
            <h3 class="text-4xl font-extrabold text-gray-900">{{ $inquiriesCount }}</h3>
        </div>
        <div class="bg-red-50 p-4 text-red-600 rounded-xl">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        </div>
    </div>

    <div class="bg-white p-8 shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-1">Total Customers</p>
            <h3 class="text-4xl font-extrabold text-gray-900">{{ $usersCount }}</h3>
        </div>
        <div class="bg-amber-50 p-4 text-amber-600 rounded-xl">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        </div>
    </div>
</div>


<div class="bg-white shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-8 border-b border-gray-100 flex justify-between items-center">
        <h3 class="text-xl font-bold">Recently Added Vehicles</h3>
        <a href="{{ route('admin.cars.index') }}" class="text-sm font-bold text-red-600 hover:underline">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Vehicle</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Brand/Model</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Price</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($recentCars as $car)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-8 py-4">
                        @php $images = $car->images ?? []; @endphp
                        <img src="{{ !empty($images) ? asset('storage/'.$images[0]) : 'https://via.placeholder.com/100' }}" class="w-16 h-10 object-cover rounded border">
                    </td>
                    <td class="px-8 py-4">
                        <span class="font-bold text-gray-900">{{ $car->brand }} {{ $car->model }}</span>
                        <span class="block text-xs text-gray-500">{{ $car->year }}</span>
                    </td>
                    <td class="px-8 py-4 font-bold">Rs. {{ number_format($car->price) }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 text-[10px] font-bold uppercase rounded-full {{ $car->status == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $car->status }}
                        </span>
                    </td>
                    <td class="px-8 py-4">
                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="text-gray-400 hover:text-gray-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

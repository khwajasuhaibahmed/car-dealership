@extends('layouts.admin')

@section('header', 'Register New Vehicle')

@section('content')
<div class="max-w-4xl bg-white shadow-xl border border-gray-100 p-12">
    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
            <div class="col-span-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Vehicle Title</label>
                <input type="text" name="title" required placeholder="e.g. 2024 Kia Sportage AWD" 
                    class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none text-xl font-bold placeholder:font-normal">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Brand</label>
                <input type="text" name="brand" value="Kia" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Model</label>
                <input type="text" name="model" required placeholder="e.g. Sportage" class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Manufacturing Year</label>
                <input type="number" name="year" value="{{ date('Y') }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Price (PKR)</label>
                <input type="number" name="price" required placeholder="e.g. 8500000" class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Mileage (KM)</label>
                <input type="number" name="mileage" required placeholder="0 for new" class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Fuel Type</label>
                <select name="fuel_type" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Hybrid">Hybrid</option>
                    <option value="Electric">Electric</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Transmission</label>
                <select name="transmission" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="Automatic">Automatic (DCT/CVT)</option>
                    <option value="Manual">Manual</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Body Type</label>
                <select name="body_type" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="SUV">SUV</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Crossover">Crossover</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Exterior Color</label>
                <input type="text" name="color" required placeholder="e.g. Panthera Metal" class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div class="flex items-center gap-4 mt-4">
                <input type="checkbox" name="is_featured" id="is_featured" class="w-5 h-5 text-red-600 focus:ring-red-600 border-gray-300 rounded">
                <label for="is_featured" class="text-sm font-bold text-gray-700 uppercase cursor-pointer">Mark as Featured</label>
            </div>

            <div class="col-span-2 mt-8">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Vehicle Images</label>
                <div class="border-2 border-dashed border-gray-200 p-8 text-center hover:border-red-600 transition">
                    <input type="file" name="images[]" multiple class="hidden" id="car-images" accept="image/*">
                    <label for="car-images" class="cursor-pointer">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-gray-500 font-medium">Click to upload multiple images</p>
                        <p class="text-xs text-gray-400 mt-1 uppercase tracking-tighter">PNG, JPG or WEBP (MAX 4MB per image)</p>
                    </label>
                </div>
            </div>

            <div class="col-span-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Detailed Description</label>
                <textarea name="description" rows="6" required class="w-full p-4 bg-gray-50 border-gray-200 focus:bg-white focus:border-red-600 transition outline-none rounded-lg" placeholder="Enter key features, safety options, and mechanical details..."></textarea>
            </div>
        </div>

        <div class="flex justify-end gap-6 pt-10 border-t border-gray-100">
            <a href="{{ route('admin.cars.index') }}" class="px-8 py-4 font-bold text-gray-400 uppercase tracking-widest hover:text-gray-900 transition">Discard</a>
            <button type="submit" class="px-12 py-4 bg-gray-900 text-white font-extrabold uppercase tracking-widest hover:bg-black transition shadow-lg">Create Listing</button>
        </div>
    </form>
</div>
@endsection

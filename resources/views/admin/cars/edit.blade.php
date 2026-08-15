@extends('layouts.admin')

@section('header', 'Edit Vehicle Details')

@section('content')
<div class="max-w-4xl bg-white shadow-xl border border-gray-100 p-12">
    @if ($errors->any())
        <div class="mb-10 p-4 bg-red-50 border-l-4 border-red-600 text-red-700 text-sm font-bold uppercase tracking-widest">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
            <div class="col-span-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Vehicle Title</label>
                <input type="text" name="title" value="{{ $car->title }}" required 
                    class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none text-xl font-bold">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Brand</label>
                <input type="text" name="brand" value="{{ $car->brand }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Model</label>
                <input type="text" name="model" value="{{ $car->model }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Manufacturing Year</label>
                <input type="number" name="year" value="{{ $car->year }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Price (PKR)</label>
                <input type="number" name="price" value="{{ $car->price }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Mileage (KM)</label>
                <input type="number" name="mileage" value="{{ $car->mileage }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Fuel Type</label>
                <select name="fuel_type" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="Petrol" {{ $car->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                    <option value="Diesel" {{ $car->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="Hybrid" {{ $car->fuel_type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="Electric" {{ $car->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Transmission</label>
                <select name="transmission" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="Automatic" {{ $car->transmission == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                    <option value="Manual" {{ $car->transmission == 'Manual' ? 'selected' : '' }}>Manual</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Status</label>
                <select name="status" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold" {{ $car->status == 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Body Type</label>
                <select name="body_type" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none bg-transparent">
                    <option value="SUV" {{ $car->body_type == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Sedan" {{ $car->body_type == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="Hatchback" {{ $car->body_type == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                    <option value="Crossover" {{ $car->body_type == 'Crossover' ? 'selected' : '' }}>Crossover</option>
                </select>
            </div>


            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Exterior Color</label>
                <input type="text" name="color" value="{{ $car->color }}" required class="w-full p-4 border-b-2 border-gray-200 focus:border-red-600 transition outline-none">
            </div>


            <div class="flex items-center gap-4 mt-4">
                <input type="checkbox" name="is_featured" id="is_featured" {{ $car->is_featured ? 'checked' : '' }} class="w-5 h-5 text-red-600 focus:ring-red-600 border-gray-300 rounded">
                <label for="is_featured" class="text-sm font-bold text-gray-700 uppercase cursor-pointer">Mark as Featured</label>
            </div>

            <div class="col-span-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Current Images</label>
                <div class="flex flex-wrap gap-4 mb-6">
                    @foreach($car->images ?? [] as $index => $img)
                        @if(is_string($img))
                        <div class="relative group w-40 h-28">
                            @php $imgUrl = str_starts_with($img, 'http') ? $img : asset('storage/'.$img); @endphp
                            <img src="{{ $imgUrl }}" class="w-full h-full object-cover rounded shadow-md border border-gray-100">
                            
                            <!-- Remove Button Overlay -->
                            <form action="{{ route('admin.cars.remove-image', [$car->id, $index]) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white p-1.5 rounded-full shadow-lg hover:bg-red-700 transition" title="Remove Image">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </form>
                        </div>
                        @endif
                    @endforeach
                </div>


                <input type="file" name="images[]" multiple class="w-full p-4 bg-gray-50 border-gray-200 rounded">
                <p class="text-xs text-gray-400 mt-2">Uploading new images will append to existing ones.</p>
            </div>

            <div class="col-span-2">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Detailed Description</label>
                <textarea name="description" rows="6" required class="w-full p-4 bg-gray-50 border-gray-200 rounded-lg outline-none focus:border-red-600 transition">{{ $car->description }}</textarea>
            </div>
        </div>

        <div class="flex justify-end gap-6 pt-10 border-t border-gray-100">
            <button type="submit" class="px-12 py-4 bg-gray-900 text-white font-extrabold uppercase tracking-widest hover:bg-black transition shadow-lg">Update Vehicle</button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('header', 'Vehicle Inventory')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-gray-900">Manage Cars</h2>
        <p class="text-sm text-gray-500">Total {{ $cars->total() }} vehicles in inventory</p>
    </div>
    <a href="{{ route('admin.cars.create') }}" class="px-6 py-3 bg-red-600 text-white font-bold uppercase tracking-widest hover:bg-red-700 transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Add New Vehicle
    </a>
</div>

<div class="bg-white shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Image</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Details</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Price & Specs</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($cars as $car)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-8 py-4">
                        @php 
                            $images = $car->images ?? []; 
                            $firstImage = (is_array($images) && count($images) > 0) ? $images[0] : null;
                            if ($firstImage) {
                                $imageUrl = str_starts_with($firstImage, 'http') ? $firstImage : asset('storage/'.$firstImage);
                            } else {
                                $imageUrl = 'https://placehold.co/800x600/1a1a1a/ffffff?text=No+Photo';
                            }
                        @endphp
                        <img src="{{ $imageUrl }}" class="w-24 h-16 object-cover rounded shadow-sm">

                    </td>
                    <td class="px-8 py-4">
                        <span class="font-bold text-gray-900 block text-lg">{{ $car->brand }} {{ $car->model }}</span>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs font-medium text-gray-500 px-2 py-0.5 bg-gray-100 rounded">{{ $car->year }}</span>
                            <span class="text-xs font-medium text-gray-500 px-2 py-0.5 bg-gray-100 rounded">{{ $car->color }}</span>
                            @if($car->is_featured)
                                <span class="text-[10px] font-bold text-amber-600 px-2 py-0.5 bg-amber-50 rounded uppercase">Featured</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-4">
                        <span class="font-bold text-gray-900 block">Rs. {{ number_format($car->price) }}</span>
                        <span class="text-xs text-gray-500">{{ $car->mileage }} km | {{ $car->transmission }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="px-3 py-1 text-[10px] font-bold uppercase rounded-full w-fit {{ $car->status == 'available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $car->status }}
                            </span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-right">
                        <div class="flex justify-end gap-3 text-gray-400">
                            <a href="{{ route('admin.cars.edit', $car->id) }}" class="hover:text-red-600 transition p-2 hover:bg-red-50 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:text-red-600 transition p-2 hover:bg-red-50 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-6 border-t border-gray-100">
        {{ $cars->links() }}
    </div>
</div>
@endsection

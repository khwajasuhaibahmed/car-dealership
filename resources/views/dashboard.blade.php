<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tighter uppercase">
                    My Showroom
                </h2>
                <p class="text-gray-500 text-sm mt-1">Manage your inquiries and vehicle preferences.</p>
            </div>
            <div class="flex items-center gap-4 bg-white p-2 border border-gray-100 shadow-sm">
                <div class="text-right px-4">
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Active Status</span>
                    <span class="text-green-600 font-bold text-sm">Authenticated</span>
                </div>
                <img src="{{ auth()->user()->profile_image ? asset('storage/'.auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" class="w-12 h-12 rounded-none border-2 border-gray-900">
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Welcome Card -->
            <div class="bg-gray-950 text-white p-12 relative overflow-hidden">
                <div class="relative z-10 max-w-2xl">
                    <h3 class="text-5xl font-bold tracking-tighter mb-6 italic">WELCOME BACK, {{ strtoupper(auth()->user()->name) }}</h3>
                    <p class="text-xl text-gray-400 mb-8 leading-relaxed font-light">Experience the future of mobility. Explore our latest models or manage your existing interests from your personalized dashboard.</p>
                    <div class="flex gap-4">
                        <a href="{{ route('inventory.index') }}" class="bg-white text-black px-8 py-4 font-bold uppercase tracking-widest hover:bg-red-600 hover:text-white transition">Browse Vehicles</a>
                        <a href="{{ route('profile.edit') }}" class="border border-white/20 text-white px-8 py-4 font-bold uppercase tracking-widest hover:bg-white/10 transition">Account Settings</a>
                    </div>
                </div>
                <div class="absolute -right-20 -bottom-20 opacity-10 select-none">
                    <span class="text-[300px] font-black tracking-tighter">ELITE</span>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Stat Cards -->
                <div class="bg-white p-8 border border-gray-100 shadow-sm">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 block">Total Inquiries</span>
                    <div class="flex items-end gap-2">
                        <span class="text-4xl font-black text-gray-900 leading-none">{{ $totalInquiries }}</span>
                        <span class="text-gray-400 text-sm mb-1 italic">Personal Leads</span>
                    </div>
                    <div class="h-1 w-12 bg-gray-900 mt-6"></div>
                </div>


                <div class="bg-white p-8 border border-gray-100 shadow-sm">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 block">Account Type</span>
                    <div class="flex items-end gap-2">
                        <span class="text-4xl font-black text-gray-900 leading-none capitalize">{{ auth()->user()->role }}</span>
                    </div>
                    <div class="h-1 w-12 bg-gray-900 mt-6"></div>
                </div>

                <div class="bg-white p-8 border border-gray-100 shadow-sm">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 block">Member Since</span>
                    <div class="flex items-end gap-2">
                        <span class="text-xl font-bold text-gray-900">{{ auth()->user()->created_at->format('M Y') }}</span>
                    </div>
                    <div class="h-1 w-12 bg-gray-900 mt-6"></div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white border border-gray-100 shadow-sm">
                <div class="p-8 border-b border-gray-50 flex justify-between items-center">
                    <h4 class="font-black text-gray-900 uppercase tracking-widest">Recent Interests</h4>
                    <span class="text-xs font-bold text-gray-400 uppercase">Personal History</span>
                </div>
                <div>
                    @if($inquiries->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-50 border-b border-gray-100">
                                    <tr>
                                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Vehicle</th>
                                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Date</th>
                                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($inquiries as $inquiry)
                                    <tr class="hover:bg-gray-50/50 transition">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center gap-4">
                                                @php 
                                                    $imgs = $inquiry->car->images ?? [];
                                                    $firstImg = count($imgs) > 0 ? $imgs[0] : null;
                                                    if ($firstImg) {
                                                        $thumb = str_starts_with($firstImg, 'http') ? $firstImg : asset('storage/'.$firstImg);
                                                    } else {
                                                        $thumb = 'https://placehold.co/100x70/1a1a1a/ffffff?text=No+Photo';
                                                    }
                                                @endphp
                                                <img src="{{ $thumb }}" class="w-16 h-12 object-cover rounded shadow-sm">
                                                <div>
                                                    <span class="block font-bold text-gray-900">{{ $inquiry->car->brand }} {{ $inquiry->car->model }}</span>
                                                    <span class="text-xs text-gray-400 uppercase font-bold">{{ $inquiry->car->year }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="text-gray-600 text-sm">{{ $inquiry->created_at->format('M d, Y') }}</span>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="px-3 py-1 text-[10px] font-bold uppercase tracking-widest rounded-none border {{ $inquiry->status === 'pending' ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-green-50 text-green-600 border-green-100' }}">
                                                {{ $inquiry->status }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <a href="{{ route('inventory.show', $inquiry->car->id) }}" class="text-xs font-bold text-gray-900 uppercase tracking-widest border-b-2 border-transparent hover:border-red-600 transition">View Car</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-20 text-center">
                            <div class="bg-gray-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-gray-400 italic">No recent inquiries found. Start exploring our inventory!</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

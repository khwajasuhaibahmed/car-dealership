@extends('layouts.admin')

@section('content')
<div class="mb-10">
    <h1 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">Registered Customers</h1>
    <p class="text-gray-500">Manage and view all verified users in the system.</p>
</div>

<div class="bg-white border border-gray-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Customer</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Contact Info</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Address</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Registration Status</th>
                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Joined Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($users as $user)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-6">
                    <div class="flex items-center gap-4">
                        <img src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" class="w-10 h-10 rounded-none border border-gray-200">
                        <div>
                            <span class="block font-bold text-gray-900 uppercase tracking-tight">{{ $user->name }}</span>
                            <span class="text-xs text-gray-400">ID: #USR-{{ $user->id }}</span>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-6">
                    <span class="block font-medium text-gray-700">{{ $user->email }}</span>
                    <span class="text-sm text-gray-400">{{ $user->phone ?? 'No phone provided' }}</span>
                </td>
                <td class="px-6 py-6">
                    <p class="text-sm text-gray-500 max-w-xs truncate">{{ $user->address ?? 'N/A' }}</p>
                </td>
                <td class="px-6 py-6 text-center">
                    @if($user->is_approved)
                        <span class="px-3 py-1 bg-green-50 text-green-700 text-xs font-bold uppercase tracking-widest border border-green-100">Approved</span>
                    @else
                        <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-bold uppercase tracking-widest border border-amber-200 hover:bg-amber-600 hover:text-white transition cursor-pointer">
                                Pending (Approve?)
                            </button>
                        </form>
                    @endif
                </td>

                <td class="px-6 py-6 text-right text-gray-400 font-mono text-xs uppercase">
                    {{ $user->created_at->format('d M Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-20 text-center text-gray-400 italic">
                    No customers found in the system.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-8">
    {{ $users->links() }}
</div>
@endsection

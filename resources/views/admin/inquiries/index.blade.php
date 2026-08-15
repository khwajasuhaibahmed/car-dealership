@extends('layouts.admin')

@section('header', 'Customer Inquiries')

@section('content')
<div class="mb-8">
    <h2 class="text-xl font-bold text-gray-900">Manage Leads</h2>
    <p class="text-sm text-gray-500">Inbound requests from potential buyers</p>
</div>

<div class="bg-white shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Customer</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Vehicle Requested</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Message</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Date</th>
                    <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($inquiries as $inquiry)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-8 py-4">
                        <span class="font-bold text-gray-900 block">{{ $inquiry->name }}</span>
                        <span class="text-xs text-gray-500">{{ $inquiry->email }}</span>
                        <span class="block text-xs text-gray-500">{{ $inquiry->phone }}</span>
                    </td>
                    <td class="px-8 py-4">
                        @if($inquiry->car)
                        <a href="{{ route('admin.cars.edit', $inquiry->car->id) }}" class="text-red-600 font-bold hover:underline">
                            {{ $inquiry->car->brand }} {{ $inquiry->car->model }}
                        </a>
                        <span class="block text-xs text-gray-400">Rs. {{ number_format($inquiry->car->price) }}</span>
                        @else
                        <span class="text-gray-400 italic">General Inquiry</span>
                        @endif
                    </td>
                    <td class="px-8 py-4">
                        <p class="text-sm text-gray-600 max-w-xs truncate" title="{{ $inquiry->message }}">{{ $inquiry->message }}</p>
                    </td>
                    <td class="px-8 py-4 text-xs text-gray-500">
                        {{ $inquiry->created_at->format('M d, Y') }}
                        <span class="block">{{ $inquiry->created_at->format('h:i A') }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <select onchange="updateInquiryStatus({{ $inquiry->id }}, this.value, event)" 
                            data-original-status="{{ $inquiry->status }}"
                            class="text-xs font-bold uppercase rounded-none px-4 py-2 border-none focus:ring-0 cursor-pointer transition
                            {{ $inquiry->status == 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $inquiry->status == 'contacted' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $inquiry->status == 'resolved' ? 'bg-green-100 text-green-700' : '' }}">
                            <option value="pending" {{ $inquiry->status == 'pending' ? 'selected' : '' }} class="bg-white text-gray-900">Pending</option>
                            <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }} class="bg-white text-gray-900">Contacted</option>
                            <option value="resolved" {{ $inquiry->status == 'resolved' ? 'selected' : '' }} class="bg-white text-gray-900">Resolved</option>
                        </select>
                    </td>



                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-6 border-t border-gray-100">
        {{ $inquiries->links() }}
    </div>
</div>

<script>
function updateInquiryStatus(id, status, event) {
    const select = event.target;
    const originalStatus = select.getAttribute('data-original-status');
    
    fetch(`/admin/inquiries/${id}/status`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ status: status })
    })
    .then(async response => {
        const data = await response.json();
        if(response.ok) {
            // Update colors dynamically
            select.classList.remove('bg-amber-100', 'text-amber-700', 'bg-blue-100', 'text-blue-700', 'bg-green-100', 'text-green-700');
            
            if(status === 'pending') select.classList.add('bg-amber-100', 'text-amber-700');
            if(status === 'contacted') select.classList.add('bg-blue-100', 'text-blue-700');
            if(status === 'resolved') select.classList.add('bg-green-100', 'text-green-700');
            
            select.setAttribute('data-original-status', status);
            console.log('Status updated successfully');
        } else {
            console.error('Server error:', data);
            alert('Error: ' + (data.message || 'Failed to update status'));
            // Revert to original
            select.value = originalStatus;
        }
    })
    .catch(error => {
        console.error('Network Error:', error);
        alert('A network error occurred. Please check your connection.');
        if(originalStatus) select.value = originalStatus;
    });
}
</script>



@endsection

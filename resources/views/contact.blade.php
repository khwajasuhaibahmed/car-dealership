@extends('layouts.public')

@section('title', 'Contact Us | Kia Motors')

@section('content')
<div class="relative h-[400px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Contact Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    <div class="relative h-full max-w-7xl mx-auto px-4 flex items-center">
        <div class="text-white">
            <h1 class="text-6xl font-extrabold tracking-tighter mb-4">GET IN TOUCH</h1>
            <p class="text-xl text-gray-300 max-w-xl font-light">Whether you're looking for a new Kia or need service for your current one, we're here to help.</p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
        <div>
            <h2 class="text-3xl font-bold mb-8 italic">CONTACT INFORMATION</h2>
            <div class="space-y-12">
                <div class="flex gap-6">
                    <div class="bg-gray-900 text-white p-4 h-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2 uppercase">Main Headquarters</h4>
                        <p class="text-gray-500 leading-relaxed">Bin Qasim Industrial Park (BQIP), Karachi, Pakistan.</p>
                    </div>
                </div>

                <div class="flex gap-6">
                    <div class="bg-gray-900 text-white p-4 h-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2 uppercase">Customer Support</h4>
                        <p class="text-gray-500 leading-relaxed">UAN: (021) 111-111-KIA (542)<br>Email: info@kiapk.com</p>
                    </div>
                </div>

                <div class="flex gap-6">
                    <div class="bg-gray-900 text-white p-4 h-fit">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold mb-2 uppercase">Business Hours</h4>
                        <p class="text-gray-500 leading-relaxed">Monday - Saturday: 9:00 AM - 6:00 PM<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white p-12 shadow-2xl border border-gray-100">
                <h2 class="text-3xl font-bold mb-8">SEND A MESSAGE</h2>
                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">First Name</label>
                            <input type="text" name="name" required class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email</label>
                            <input type="email" name="email" required class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Phone Number</label>
                        <input type="text" name="phone" required class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Your Message</label>
                        <textarea name="message" rows="5" required class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none"></textarea>
                    </div>
                    <button type="submit" class="btn-kia w-full py-5 text-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

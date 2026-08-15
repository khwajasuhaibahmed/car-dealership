<x-guest-layout>
    <div class="text-center">
        <div class="mb-8 flex justify-center">
            <div class="bg-amber-50 p-6 rounded-none border border-amber-100">
                <svg class="w-16 h-16 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter mb-4">Registration Update</h2>
        <p class="text-lg text-gray-600 mb-10 leading-relaxed font-light">
            Your email has been verified. However, our dealership uses a <span class="font-bold text-gray-900">manual approval process</span> to ensure the highest quality of service.
        </p>

        <div class="bg-gray-50 p-8 border border-gray-100 mb-10">
            <h3 class="text-xs font-bold text-amber-600 uppercase tracking-widest mb-2">Current Status</h3>
            <p class="text-2xl font-black text-gray-900 uppercase tracking-tighter">WAITING FOR ADMIN APPROVAL</p>
        </div>

        <div class="space-y-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full btn-kia py-4 text-center cursor-pointer shadow-lg">
                    Sign Out / Back to Login
                </button>
            </form>
            
            <a href="{{ route('home') }}" class="block w-full py-4 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-900 transition underline underline-offset-8">
                Return to Website
            </a>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-100">
            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] leading-loose">
                You will be notified via email immediately<br>once your elite access is granted.
            </p>
        </div>
    </div>
</x-guest-layout>

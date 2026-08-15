<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter mb-4">Verify Identity</h2>
        <div class="text-lg text-gray-600 leading-relaxed font-light">
            {{ __('Thanks for signing up! We\'ve sent an activation link to your email. This is the first of two steps to access our elite showroom.') }}
        </div>
    </div>

    <div class="bg-gray-50 p-6 border-l-4 border-amber-500 mb-8">
        <p class="text-sm text-gray-600 italic">
            <strong>Step 1:</strong> Verify your email address (Link sent)<br>
            <strong>Step 2:</strong> Wait for manual Admin Approval
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-8 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 font-bold uppercase tracking-widest text-xs">
            {{ __('A fresh activation link has been dispatched to your inbox.') }}
        </div>
    @endif

    <div class="space-y-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full btn-kia py-5 text-sm font-extrabold shadow-xl">
                {{ __('RESEND VERIFICATION EMAIL') }}
            </button>
        </form>

        <div class="flex items-center justify-between pt-4">
            <a href="/" class="text-xs font-bold text-gray-400 hover:text-gray-900 uppercase tracking-widest transition underline underline-offset-4">
                &larr; Back to Website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-bold text-red-600 hover:underline uppercase tracking-widest transition">
                    {{ __('Cancel / Log In') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>

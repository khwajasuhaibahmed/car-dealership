<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Professional Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none text-lg font-medium placeholder:font-normal"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-3">
                <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest">Secret Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-red-600 hover:underline uppercase tracking-widest" href="{{ route('password.request') }}">
                        {{ __('Forgot?') }}
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none text-lg font-medium"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 border-2 border-gray-300 rounded-none text-gray-900 focus:ring-0 transition cursor-pointer">
                <span class="ms-3 text-sm font-bold text-gray-500 group-hover:text-gray-900 transition uppercase tracking-tighter">{{ __('Keep me logged in') }}</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full btn-kia py-5 text-lg font-extrabold shadow-xl">
                SIGN IN TO DASHBOARD
            </button>
        </div>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-600 mt-8">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-bold text-gray-900 hover:text-red-600 transition underline underline-offset-4">Register Now</a>
            </p>
        @endif
    </form>
</x-guest-layout>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none font-medium"
                placeholder="John Doe">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none font-medium"
                placeholder="name@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Create Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none font-medium"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full p-4 border-b-2 border-gray-200 focus:border-gray-900 transition outline-none font-medium"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-6 flex flex-col gap-4">
            <button type="submit" class="w-full btn-kia py-5 text-lg font-extrabold shadow-xl">
                CREATE ACCOUNT
            </button>
            <a class="text-center text-sm font-bold text-gray-500 hover:text-gray-900 uppercase tracking-widest transition" href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>
        </div>
    </form>
</x-guest-layout>

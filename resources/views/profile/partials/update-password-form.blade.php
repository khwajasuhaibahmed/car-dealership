<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">
            {{ __('Security Settings') }}
        </h2>

        <p class="mt-2 text-sm text-gray-400 font-medium uppercase tracking-widest">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-elite-input font-bold" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="update_password_password" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">New Password</label>
                <input id="update_password_password" name="password" type="password" class="form-elite-input font-bold" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password_confirmation" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Confirm New Password</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-elite-input font-bold" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="btn-elite px-12">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                   class="text-xs font-bold text-green-600 uppercase tracking-widest animate-pulse">
                    {{ __('Security Key Updated.') }}
                </p>
            @endif
        </div>
    </form>
</section>

<section class="space-y-6">
    <header class="mb-8">
        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">
            {{ __('Terminate Membership') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 font-medium uppercase tracking-widest leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently purged from the Elite Motors vault.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 text-white px-8 py-4 text-xs font-black uppercase tracking-[0.2em] border-2 border-red-600 hover:bg-transparent hover:text-red-600 transition"
    >{{ __('Delete My Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-12 bg-white rounded-none">
            @csrf
            @method('delete')

            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter mb-4">
                {{ __('Final Confirmation') }}
            </h2>

            <p class="text-sm text-gray-500 uppercase tracking-widest leading-relaxed mb-8">
                {{ __('To secure this action, please enter your password. This process is irreversible.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-elite-input font-bold"
                    placeholder="{{ __('Verification Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex gap-4">
                <button type="button" x-on:click="$dispatch('close')" class="flex-1 border-2 border-gray-200 px-6 py-4 text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-gray-900 hover:border-gray-900 transition">
                    {{ __('Keep Membership') }}
                </button>

                <button type="submit" class="flex-1 bg-red-600 border-2 border-red-600 text-white px-6 py-4 text-xs font-black uppercase tracking-widest hover:bg-transparent hover:text-red-600 transition">
                    {{ __('Confirm Deletion') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>

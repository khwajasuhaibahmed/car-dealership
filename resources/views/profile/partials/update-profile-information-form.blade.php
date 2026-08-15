<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-gray-400 font-medium uppercase tracking-widest">
            {{ __("Update your account's profile information and details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-8" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col md:flex-row gap-8 items-start">
            <div class="flex-shrink-0">
                <div class="relative group">
                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" 
                         class="w-32 h-32 object-cover border-4 border-gray-900 shadow-2xl">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center pointer-events-none">
                        <span class="text-white text-[10px] font-bold uppercase tracking-widest">Change</span>
                    </div>
                </div>
            </div>
            
            <div class="flex-grow w-full space-y-6">
                <div>
                    <label for="profile_image" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Update Profile Image</label>
                    <input id="profile_image" name="profile_image" type="file" 
                           class="form-elite-input py-2 text-xs" />
                    <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Full Name</label>
                        <input id="name" name="name" type="text" class="form-elite-input font-bold" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Email Address</label>
                        <input id="email" name="email" type="email" class="form-elite-input font-bold" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-gray-100">
            <div class="md:col-span-1">
                <label for="phone" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Phone Number</label>
                <input id="phone" name="phone" type="text" class="form-elite-input font-bold" value="{{ old('phone', $user->phone) }}" autocomplete="tel" placeholder="+1..." />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-3">Residential Address</label>
                <input id="address" name="address" type="text" class="form-elite-input font-bold" value="{{ old('address', $user->address) }}" placeholder="Street, City, Country" />
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="btn-elite px-12">
                {{ __('Update Profile') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                   class="text-xs font-bold text-green-600 uppercase tracking-widest animate-pulse">
                    {{ __('Details Saved Successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>

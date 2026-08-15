<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-4xl font-black text-gray-900 tracking-tighter uppercase italic">
                    {{ __('Member Profile') }}
                </h2>
                <p class="text-gray-400 text-xs font-bold uppercase tracking-[0.2em] mt-2">Personalize your elite experience.</p>
            </div>
            <div class="h-10 w-1 bg-gray-900 hidden md:block"></div>
        </div>
    </x-slot>

    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-20">
            <!-- Account Section -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                <div class="lg:col-span-1 sticky top-10">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4 block">Section 01</span>
                    <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter mb-4">Identity</h3>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">Control how you appear within our premium network and maintain your contact details.</p>
                </div>
                <div class="lg:col-span-3 p-10 md:p-16 card-elite">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Security Section -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start">
                <div class="lg:col-span-1 sticky top-10">
                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4 block">Section 02</span>
                    <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter mb-4">Security</h3>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">Protect your vault with a high-entropy password to prevent unauthorized access.</p>
                </div>
                <div class="lg:col-span-3 p-10 md:p-16 card-elite">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 items-start opacity-75 hover:opacity-100 transition duration-500">
                <div class="lg:col-span-1 sticky top-10">
                    <span class="text-[10px] font-black text-red-400 uppercase tracking-[0.3em] mb-4 block">Critical</span>
                    <h3 class="text-2xl font-black text-red-600 uppercase tracking-tighter mb-4">Exclusion</h3>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">Permanently revoke your membership and erase your digital footprint from Elite Motors.</p>
                </div>
                <div class="lg:col-span-3 p-10 md:p-16 bg-red-50/30 border border-red-100 shadow-sm relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none">
                        <svg class="w-64 h-64 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

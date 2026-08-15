<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 py-2">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-black tracking-tighter text-gray-900 italic uppercase">
                        Elite Motors
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-12 sm:-my-px sm:ms-16 sm:flex">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-400 hover:text-gray-700 hover:border-gray-300' }} text-xs font-bold uppercase tracking-[0.2em] transition duration-150 ease-in-out">
                        Dashboard
                    </a>
                    <a href="{{ route('inventory.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('inventory.*') ? 'border-gray-900 text-gray-900' : 'border-transparent text-gray-400 hover:text-gray-700 hover:border-gray-300' }} text-xs font-bold uppercase tracking-[0.2em] transition duration-150 ease-in-out">
                        Inventory
                    </a>
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-red-600 border-transparent hover:text-red-700 text-xs font-bold uppercase tracking-[0.2em] transition duration-150 ease-in-out">
                        Admin Panel
                    </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-3 text-sm font-bold text-gray-900 uppercase tracking-widest focus:outline-none transition group">
                        <span class="border-b-2 border-transparent group-hover:border-gray-900 pb-1">{{ Auth::user()->name }}</span>
                        <img src="{{ auth()->user()->profile_image ? asset('storage/'.auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" class="w-10 h-10 rounded-none border border-gray-200">
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-4 w-48 bg-white border border-gray-100 shadow-xl z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-4 text-xs font-bold text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition border-b border-gray-50">
                            {{ __('My Profile') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-4 text-xs font-bold text-red-600 uppercase tracking-widest hover:bg-red-50 transition">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 text-gray-400 hover:text-gray-900 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block pl-3 pr-4 py-4 border-l-4 {{ request()->routeIs('dashboard') ? 'border-gray-900 bg-gray-50 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-800 hover:bg-gray-50' }} text-xs font-bold uppercase tracking-widest">
                Dashboard
            </a>
            <a href="{{ route('inventory.index') }}" class="block pl-3 pr-4 py-4 border-l-4 {{ request()->routeIs('inventory.*') ? 'border-gray-900 bg-gray-50 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-800 hover:bg-gray-50' }} text-xs font-bold uppercase tracking-widest">
                Inventory
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center gap-4">
               <img src="{{ auth()->user()->profile_image ? asset('storage/'.auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" class="w-10 h-10 rounded-none border border-gray-200">
               <div>
                    <div class="font-bold text-xs text-gray-900 uppercase tracking-widest">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-[10px] text-gray-500 uppercase tracking-widest">{{ Auth::user()->email }}</div>
               </div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-4 text-xs font-bold text-gray-500 uppercase tracking-widest">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left pl-3 pr-4 py-4 text-xs font-bold text-red-600 uppercase tracking-widest">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

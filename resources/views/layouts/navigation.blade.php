<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT SIDE -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    @if(auth()->user()->is_admin)
                        <x-nav-link href="/admin">
                            Admin Panel
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="flex items-center space-x-4">

                @php
                    $unreadCount = auth()->user()->unreadNotifications->count();
                @endphp

                <!-- NOTIFICATION BELL -->
                <div class="relative" x-data="{ open: false }">

                    <button @click="open = !open" class="relative text-gray-600 hover:text-black">
                        🔔

                        @if($unreadCount > 0)
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                                {{ $unreadCount }}
                            </span>
                        @endif
                    </button>

                    <!-- DROPDOWN -->
                    <div x-show="open"
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg p-3 z-50">

                        <h3 class="font-bold mb-2">Notifications</h3>

                        <div id="notificationList">
                            @forelse(auth()->user()->notifications->take(5) as $notification)
                                <div class="p-2 border-b text-sm">
                                    {{ $notification->data['message'] ?? 'No message' }}
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No notifications</p>
                            @endforelse
                        </div>

                        <a href="/notifications" class="block text-center text-blue-500 text-sm mt-2">
                            View all
                        </a>

                    </div>
                </div>

                <!-- USER MENU -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm text-gray-500 hover:text-gray-700">
                            {{ auth()->user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </div>
        </div>
    </div>

</nav>

<header class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900 lg:border-b">
    <div class="flex flex-grow items-center justify-between px-3 py-3 lg:px-6 lg:py-4">
        <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
            <!-- Hamburger Toggle BTN -->
            <button
                class="z-99999 block rounded-sm border border-gray-200 bg-white p-1.5 shadow-sm dark:border-gray-800 dark:bg-gray-900 lg:hidden"
                @click.stop="sidebarToggle = !sidebarToggle"
            >
                <span class="relative block h-5.5 w-5.5 cursor-pointer">
                    <span class="du-block absolute right-0 h-full w-full">
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-gray-900 delay-[0] duration-200 ease-in-out dark:bg-white"
                            :class="{ '!w-full delay-300': !sidebarToggle, 'top-2 !w-0 delay-[0]': sidebarToggle }"
                        ></span>
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-gray-900 delay-150 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!w-full delay-400': !sidebarToggle, 'top-2 !w-0 delay-150': sidebarToggle }"
                        ></span>
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-gray-900 delay-200 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!w-full delay-500': !sidebarToggle, 'top-2 !w-0 delay-200': sidebarToggle }"
                        ></span>
                    </span>
                    <span class="absolute right-0 h-full w-full rotate-45">
                        <span
                            class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-gray-900 delay-300 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!h-0 delay-[0]': !sidebarToggle, '!h-full delay-300': sidebarToggle }"
                        ></span>
                        <span
                            class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-gray-900 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!h-0 delay-200': !sidebarToggle, '!h-0.5 delay-400': sidebarToggle }"
                        ></span>
                    </span>
                </span>
            </button>
            <!-- Hamburger Toggle BTN -->

            <a class="block flex-shrink-0 lg:hidden" href="{{ route('dashboard') }}">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="4" fill="#465FFF" class="fill-brand-500"/>
                    <path d="M17.8334 16.6667H10.5V8.5H17.8334C19.9667 8.5 21.8334 10.3667 21.8334 12.5C21.8334 14.6333 19.9667 16.6667 17.8334 16.6667Z" stroke="white" stroke-width="2"/>
                    <path d="M10.5 16.6667V23.5" stroke="white" stroke-width="2"/>
                </svg>
            </a>
        </div>

        <div class="hidden sm:block">
            <!-- Search bar removed -->
        </div>

        <div class="flex items-center gap-3 2xsm:gap-7 ml-auto">
            <ul class="flex items-center gap-2 2xsm:gap-4">
                <!-- Theme Switcher -->
                <li>
                    <div class="relative bg-gray-100 dark:bg-gray-800 rounded-full p-1 flex">
                        <button
                            @click="theme = 'light'"
                            :class="theme === 'light' ? 'bg-white shadow-sm text-gray-800 dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-400'"
                            class="rounded-full p-1.5 hover:text-gray-900 dark:hover:text-white transition-colors"
                            title="Light Mode"
                        >
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 1V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 21V23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.22 4.22L5.64 5.64" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.36 18.36L19.78 19.78" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M1 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 12H23" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.22 19.78L5.64 18.36" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.36 5.64L19.78 4.22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button
                            @click="theme = 'system'"
                            :class="theme === 'system' ? 'bg-white shadow-sm text-gray-800 dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-400'"
                            class="rounded-full p-1.5 hover:text-gray-900 dark:hover:text-white transition-colors"
                            title="System Default"
                        >
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                                <line x1="8" y1="21" x2="16" y2="21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <line x1="12" y1="17" x2="12" y2="21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <button
                            @click="theme = 'dark'"
                            :class="theme === 'dark' ? 'bg-white shadow-sm text-gray-800 dark:bg-gray-700 dark:text-white' : 'text-gray-500 dark:text-gray-400'"
                            class="rounded-full p-1.5 hover:text-gray-900 dark:hover:text-white transition-colors"
                            title="Dark Mode"
                        >
                            <svg class="fill-current" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </li>

                <!-- Notification -->
                <li>
                    <button class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border border-gray-200 bg-gray-100 hover:text-brand-500 dark:border-gray-800 dark:bg-gray-900 dark:hover:text-brand-500">
                        <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-500"></span>
                        <svg class="fill-current text-gray-500 hover:text-brand-500 dark:text-gray-400" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 8A6 6 0 0 0 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.73 21A2 2 0 0 1 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </li>
            </ul>

            <!-- User Area -->
            <div x-data="{ dropdownOpen: false }" class="relative" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-3" href="#" @click.prevent="dropdownOpen = !dropdownOpen">
                    <span class="h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos() && Auth::user()->profile_photo_url)
                             <img src="{{ Auth::user()->profile_photo_url }}" alt="User" class="h-full w-full object-cover"/>
                        @else
                             <svg class="h-full w-full text-gray-400 p-1" fill="currentColor" viewBox="0 0 24 24"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        @endif
                    </span>

                    <span class="hidden text-right lg:block">
                        <span class="block text-sm font-medium text-gray-700 dark:text-white">{{ Auth::user()->name ?? 'User' }}</span>
                    </span>

                    <svg :class="dropdownOpen && 'rotate-180'" class="hidden fill-current text-gray-500 sm:block" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z" fill=""/>
                    </svg>
                </a>

                <!-- Dropdown Start -->
                <div x-show="dropdownOpen" class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-lg border border-gray-200 bg-white shadow-theme-lg dark:border-gray-800 dark:bg-gray-900" style="display: none;">
                    <ul class="flex flex-col gap-5 border-b border-gray-200 px-6 py-7.5 dark:border-gray-800">
                        <li>
                            <a href="{{ route('profile.show') }}" class="flex items-center gap-3.5 text-sm font-medium text-gray-700 duration-300 ease-in-out hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-500 lg:text-base">
                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 11.0001C8.21544 11.0001 5.95831 8.74301 5.95831 5.95834C5.95831 3.17367 8.21544 0.916672 11 0.916672C13.7846 0.916672 16.0416 3.17367 16.0416 5.95834C16.0416 8.74301 13.7846 11.0001 11 11.0001ZM11 2.29167C8.96665 2.29167 7.33331 3.92501 7.33331 5.95834C7.33331 7.99167 8.96665 9.62501 11 9.62501C13.0333 9.62501 14.6666 7.99167 14.6666 5.95834C14.6666 3.92501 13.0333 2.29167 11 2.29167Z" fill=""/>
                                    <path d="M19.9376 21.0833C19.7543 21.0833 19.6168 21.0375 19.4335 20.9458C17.1418 19.7542 14.0751 18.7917 11.0001 18.7917C7.92514 18.7917 4.85848 19.7542 2.56681 20.9458C2.29181 21.1292 1.92514 20.9917 1.74181 20.7167C1.55848 20.4417 1.69598 20.075 1.97098 19.8917C4.40014 18.6083 7.60431 17.4167 11.0001 17.4167C14.3959 17.4167 17.5543 18.6083 19.9835 19.8917C20.2585 20.0292 20.3501 20.3958 20.2126 20.6708C20.1209 20.9458 20.0293 21.0833 19.9376 21.0833Z" fill=""/>
                                </svg>
                                My Profile
                            </a>
                        </li>
                    </ul>
                    <div class="p-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium text-gray-700 duration-300 ease-in-out hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-500 lg:text-base">
                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.25 10.0833H9.16669C8.75419 10.0833 8.43335 10.4042 8.43335 10.8167C8.43335 11.2292 8.75419 11.55 9.16669 11.55H19.25C19.6625 11.55 19.9834 11.2292 19.9834 10.8167C19.9834 10.4042 19.6625 10.0833 19.25 10.0833Z" fill=""/>
                                    <path d="M16.0875 16.4542C15.8125 16.4542 15.5375 16.3625 15.3084 16.1333C14.85 15.675 14.85 14.9417 15.3084 14.4833L17.9209 11.8708L15.3084 9.25832C14.85 8.79998 14.85 8.06665 15.3084 7.60832C15.7667 7.14998 16.5 7.14998 16.9584 7.60832L20.6709 11.3208C20.9459 11.5958 20.9459 12.0083 20.6709 12.2833L16.9584 15.9958C16.7292 16.2708 16.4084 16.4542 16.0875 16.4542Z" fill=""/>
                                    <path d="M5.50001 20.1667C3.11667 20.1667 1.14584 18.1958 1.14584 15.8125V6.18749C1.14584 3.80415 3.11667 1.83332 5.50001 1.83332H11C11.4125 1.83332 11.7333 2.15415 11.7333 2.56665C11.7333 2.97915 11.4125 3.29999 11 3.29999H5.50001C3.94167 3.29999 2.61251 4.62915 2.61251 6.18749V15.8125C2.61251 17.3708 3.94167 18.7 5.50001 18.7H11C11.4125 18.7 11.7333 19.0208 11.7333 19.4333C11.7333 19.8458 11.4125 20.1667 11 20.1667H5.50001Z" fill=""/>
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>

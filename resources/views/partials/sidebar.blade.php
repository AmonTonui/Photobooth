<aside
  :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
  class="fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-gray-900 lg:static lg:translate-x-0"
  @click.outside="sidebarToggle = false"
>
  <!-- SIDEBAR HEADER -->
  <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
    <a href="{{ route('admin.dashboard') }}">
      <div class="flex items-center gap-2">
          {{-- Simple Logo Placeholder --}}
          <div class="flex items-center justify-center w-10 h-10 rounded bg-primary text-white font-bold text-xl">
              PB
          </div>
          <span class="text-2xl font-bold text-gray-800 dark:text-white">
              PhotoBooth
          </span>
      </div>
    </a>

    <button
      class="block lg:hidden"
      @click.stop="sidebarToggle = !sidebarToggle"
    >
      <svg
        class="fill-current"
        width="20"
        height="18"
        viewBox="0 0 20 18"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
          fill=""
        />
      </svg>
    </button>
  </div>
  <!-- SIDEBAR HEADER -->

  <div
    class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear"
  >
    <!-- Sidebar Menu -->
    <nav
      class="mt-5 py-4 px-4 lg:mt-9 lg:px-6"
    >
      <!-- Menu Group -->
      <div>
        <h3 class="mb-4 ml-4 text-sm font-semibold text-gray-500 dark:text-gray-400">
          MENU
        </h3>

        <ul class="mb-6 flex flex-col gap-1.5">
          <!-- Dashboard -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-lg py-2 px-4 font-medium text-gray-700 duration-300 ease-in-out hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900 dark:bg-white/5 dark:text-white' : '' }}"
              href="{{ route('admin.dashboard') }}"
            >
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.56874 3.0375H12.4312C12.8531 3.0375 13.1906 2.7 13.1906 2.27812C13.1906 1.85625 12.8531 1.51875 12.4312 1.51875H5.56874C5.14687 1.51875 4.80937 1.85625 4.80937 2.27812C4.80937 2.7 5.14687 3.0375 5.56874 3.0375Z" fill=""/>
                    <path d="M16.3125 4.5H1.6875C0.759375 4.5 0 5.25937 0 6.1875V15.1875C0 16.1156 0.759375 16.875 1.6875 16.875H16.3125C17.2406 16.875 18 16.1156 18 15.1875V6.1875C18 5.25937 17.2406 4.5 16.3125 4.5ZM16.3125 15.1875H1.6875V6.1875H16.3125V15.1875Z" fill=""/>
                    <path d="M4.5 13.5H7.875C8.29688 13.5 8.63438 13.1625 8.63438 12.7406C8.63438 12.3188 8.29688 11.9812 7.875 11.9812H4.5C4.07812 11.9812 3.74062 12.3188 3.74062 12.7406C3.74062 13.1625 4.07812 13.5 4.5 13.5Z" fill=""/>
                </svg>
              Dashboard
            </a>
          </li>

          <!-- Packages -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-lg py-2 px-4 font-medium text-gray-700 duration-300 ease-in-out hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white {{ request()->routeIs('admin.packages.*') ? 'bg-gray-100 text-gray-900 dark:bg-white/5 dark:text-white' : '' }}"
              href="{{ route('admin.packages.index') }}"
            >
              <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5 6.1875H1.5C0.675 6.1875 0 6.8625 0 7.6875V15.3125C0 16.1375 0.675 16.8125 1.5 16.8125H16.5C17.325 16.8125 18 16.1375 18 15.3125V7.6875C18 6.8625 17.325 6.1875 16.5 6.1875ZM1.5 7.6875H16.5V15.3125H1.5V7.6875Z" fill=""/>
                  <path d="M13.5 1.125H4.5C3.675 1.125 3 1.8 3 2.625V4.875H15V2.625C15 1.8 14.325 1.125 13.5 1.125ZM4.5 2.625H13.5V3.375H4.5V2.625Z" fill=""/>
              </svg>
              Packages
            </a>
          </li>

          <!-- Extras -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-lg py-2 px-4 font-medium text-gray-700 duration-300 ease-in-out hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white {{ request()->routeIs('admin.extras.*') ? 'bg-gray-100 text-gray-900 dark:bg-white/5 dark:text-white' : '' }}"
              href="{{ route('admin.extras.index') }}"
            >
              <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16 2H2C0.9 2 0 2.9 0 4V14C0 15.1 0.9 16 2 16H16C17.1 16 18 15.1 18 14V4C18 2.9 17.1 2 16 2ZM9 12L5 8L6.41 6.59L9 9.17L12.59 5.58L14 7L9 12Z" fill=""/>
              </svg>
              Extras
            </a>
          </li>

          <!-- Bookings -->
          <li>
            <a
              class="group relative flex items-center gap-2.5 rounded-lg py-2 px-4 font-medium text-gray-700 duration-300 ease-in-out hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white {{ request()->routeIs('admin.bookings.*') ? 'bg-gray-100 text-gray-900 dark:bg-white/5 dark:text-white' : '' }}"
              href="{{ route('admin.bookings.index') }}"
            >
                <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 4H14V2H12V4H6V2H4V4H3C1.89543 4 1 4.89543 1 6V16C1 17.1046 1.89543 18 3 18H15C16.1046 18 17 17.1046 17 16V6C17 4.89543 16.1046 4 15 4ZM15 16H3V8H15V16Z" fill=""/>
                </svg>
              Bookings
            </a>
          </li>

        </ul>
      </div>
    </nav>
  </div>
</aside>

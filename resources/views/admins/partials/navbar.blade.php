<nav class="max-w-64 h-screen bg-indigo-600 text-white shadow-md" x-data="{ isOpen: true }">
    <div class="flex flex-col h-full">
        <div class="p-4">
            <div class="mb-4">
                <button @click="isOpen = !isOpen" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-center gap-2 flex-col">
                <a href="{{ route('admin.dashboard.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs('admin.dashboard.index') ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-house text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }"
                        class="transition-opacity duration-200 ease-in-out">Dashboard</span>
                </a>
                <a href="{{ route('admin.submission.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.submission.index', 'admin.submission.detail']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-file-earmark-text text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Rekap Data
                        Pengajuan</span>
                </a>
                <a href="{{ route('admin.applicant.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.applicant.index', 'admin.applicant.detail']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-person-lines-fill text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Rekap Data
                        Pencipta</span>
                </a>

                <a href="{{ route('admin.claim.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.claim.index', 'admin.claim.detail']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-person-fill-gear text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Permohonan
                        Klaim</span>
                </a>
                <a href="{{ route('admin.letter.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.letter.index', 'admin.letter.create']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-envelope-exclamation-fill text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Template surat</span>
                </a>
                <a href="{{ route('admin.users.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.users.index']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-person-vcard-fill text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Kelola Pengguna</span>
                </a>
                <a href="{{ route('admin.news.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs(['admin.news.index', 'admin.news.show' , 'admin.news.create', 'admin.news.edit']) ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-card-heading text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Kelola Berita</span>
                </a>
                <a href="{{ route('admin.notifications.index') }}"
                    :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                    class="flex items-center {{ request()->routeIs('admin.notifications.index') ? 'bg-indigo-500' : '' }} gap-4 block px-3 py-2 text-sm font-medium rounded-md duration-200 ease-in-out">
                    <i class="bi bi-bell text-xl"></i>
                    <span :class="{ 'hidden': !isOpen }"
                        class="transition-opacity duration-200 ease-in-out">Notifikasi</span>
                </a>
            </div>
        </div>
    </div>
</nav>
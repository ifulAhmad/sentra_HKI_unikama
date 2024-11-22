<nav class="p-4 bg-indigo-600 shadow-md rounded-md" x-data="{ isOpen: true }">
    <div>
        <div class="mb-4">
            <button @click="isOpen = !isOpen" type="button"
                class="relative inline-flex items-center justify-center rounded-md p-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-indigo-500"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>

                <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-center gap-2 md:flex-col" :class="{ 'flex-col': isOpen, 'flex-row': !isOpen }">
            <a href="{{ route('submission.index') }}" :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                class="flex items-center {{ request()->routeIs(['submission.index', 'submission.author1', 'submission.author2', 'submission.jenisCiptaan', 'submission.subJenisCiptaan', 'submission.uploadFile', 'submission.pernyataan']) ? 'bg-indigo-500 border-indigo-600' : '' }} gap-4 block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-indigo-500 hover:border-indigo-600 duration-200 ease-in-out">
                <i class="bi bi-file-earmark-arrow-up-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Pengajuan Hak
                    Cipta</span>
            </a>
            <a href="{{ route('progress.index') }}" :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                class="flex items-center {{ request()->routeIs(['progress.index', 'progress.detailProgress']) ? 'bg-indigo-500 border-indigo-600' : '' }} gap-4 block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-indigo-500 hover:border-indigo-600 duration-200 ease-in-out">
                <i class="bi bi-graph-up text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Kemajuan
                    Usulan</span>
            </a>
            <a href="{{ route('profile.redirect') }}" :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                class="flex items-center {{ request()->routeIs(['profile.redirect', 'profile.adjustment', 'profile.create', 'profile.index']) ? 'bg-indigo-500 border-indigo-600' : '' }} gap-4 block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-indigo-500 hover:border-indigo-600 duration-200 ease-in-out">
                <i class="bi bi-person-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Profil</span>
            </a>
            <a href="{{ route('feedback.index') }}" :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                class="{{ request()->routeIs(['feedback.index', 'feedback.detail']) ? 'bg-indigo-500 border-indigo-600' : '' }} flex items-center gap-4 block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-indigo-500 hover:border-indigo-600 duration-200 ease-in-out">
                <i class="bi bi-chat-right-dots-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }"
                    class="transition-opacity duration-200 ease-in-out">Feedback</span>
            </a>
            <a href="{{ route('sertificate.index') }}" :class="{ 'border-none hover:bg-indigo-500': isOpen, 'hover:bg-indigo-500': !isOpen }"
                class="{{ request()->routeIs('sertificate.index') ? 'bg-indigo-500 border-indigo-600' : '' }} flex items-center gap-4 block px-3 py-2 text-base font-medium text-white rounded-md hover:bg-indigo-500 hover:border-indigo-600 duration-200 ease-in-out">
                <i class="bi bi-award-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }"
                    class="transition-opacity duration-200 ease-in-out">Sertifikat</span>
            </a>
        </div>
    </div>
</nav>
<nav class="my-4 p-4 bg-white shadow-md rounded-md lg:m-0 lg:w-[30%]" x-data="{ isOpen: true }">
    <div>
        <div class="flex justify-end mb-4">
            <button @click="isOpen = !isOpen" type="button"
                class="relative inline-flex items-center justify-center rounded-md p-2 text-black focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-white"
                aria-controls="mobile-menu" aria-expanded="false">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Open main menu</span>
                <!-- Menu open: "hidden", Menu closed: "block" -->
                <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!-- Menu open: "block", Menu closed: "hidden" -->
                <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-center gap-2" :class="{ 'flex-col': isOpen, 'flex-row': !isOpen }">
            <a href="{{ route('submission.index') }}" :class="{ 'border-none': isOpen, 'hover:bg-white': !isOpen }"
                class="flex items-center {{ request()->routeIs(['submission.index', 'submission.author1', 'submission.author2', 'submission.jenisCiptaan', 'submission.subJenisCiptaan', 'submission.uploadFile', 'submission.pernyataan']) ? 'border-amber-600 text-amber-600' : '' }} gap-4 block px-3 py-2 text-base font-medium hover:text-amber-600 border rounded-md hover:bg-gray-100 hover:border-amber-600 duration-200 ease-in-out">
                <i class="bi bi-file-earmark-arrow-up-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Pengajuan Hak
                    Cipta</span>
            </a>
            <a href="{{ route('progress.index') }}" :class="{ 'border-none': isOpen, 'hover:bg-white': !isOpen }"
                class="flex items-center {{ request()->routeIs(['progress.index', 'progress.detailProgress']) ? 'border-amber-600 text-amber-600' : '' }} gap-4 block px-3 py-2 text-base font-medium hover:text-amber-600 border rounded-md hover:bg-gray-100 hover:border-amber-600 duration-200 ease-in-out">
                <i class="bi bi-graph-up text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Kemajuan
                    Usulan</span>
            </a>
            <a href="{{ route('profile.index') }}" :class="{ 'border-none': isOpen, 'hover:bg-white': !isOpen }"
                class="flex items-center {{ request()->routeIs('profile.index') ? 'border-amber-600 text-amber-600' : '' }} gap-4 block px-3 py-2 text-base font-medium border hover:text-amber-600 rounded-md hover:bg-gray-100 hover:border-amber-600 duration-200 ease-in-out">
                <i class="bi bi-person-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }" class="transition-opacity duration-200 ease-in-out">Profil</span>
            </a>
            <a href="{{ route('feedback.index') }}" :class="{ 'border-none': isOpen, 'hover:bg-white': !isOpen }"
                class="{{ request()->routeIs(['feedback.index', 'feedback.detail']) ? 'border-amber-600 text-amber-600' : '' }} flex items-center gap-4 block px-3 py-2 text-base font-medium hover:text-amber-600 border rounded-md hover:bg-gray-100 hover:border-amber-600 duration-200 ease-in-out">
                <i class="bi bi-chat-right-dots-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }"
                    class="transition-opacity duration-200 ease-in-out">Feedback</span>
            </a>
            <a href="{{ route('sertificate.index') }}" :class="{ 'border-none': isOpen, 'hover:bg-white': !isOpen }"
                class="{{ request()->routeIs('sertificate.index') ? 'border-amber-600 text-amber-600' : '' }} flex items-center gap-4 block px-3 py-2 text-base font-medium hover:text-amber-600 border rounded-md hover:bg-gray-100 hover:border-amber-600 duration-200 ease-in-out">
                <i class="bi bi-award-fill text-xl"></i>
                <span :class="{ 'hidden': !isOpen }"
                    class="transition-opacity duration-200 ease-in-out">Sertifikat</span>
            </a>
        </div>
    </div>
</nav>
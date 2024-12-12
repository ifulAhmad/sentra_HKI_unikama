<header class="flex items-center justify-between bg-indigo-100 py-3 px-5 sticky top-0 z-[90]">
    <!-- search -->
    <form action="{{ route('admin.search') }}" class="flex items-center gap-3">
        <input type="search" name="query" value="{{ request('query') }}" placeholder="Search..."
            class="w-80 py-1 px-2 bg-indigo-100 outline-0 rounded-3xl border border-indigo-300 focus:border-indigo-400 focus:bg-indigo-200">
        <button type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
    <!-- end search -->

    <div class=" flex items-center gap-3">
        <a href="{{ route('admin.account.check') }}" class="hover:text-indigo-600">
            <i class="bi bi-gear text-xl"></i>
        </a>
        |

        <form action="{{ route('auth.logout') }}" method="post" class="w-full">
            @csrf
            <button type="submit" class="w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100"
                role="menuitem" tabindex="-1" id="user-menu-item-2">
                <i class="bi bi-door-open text-xl"></i> Sign out</button>
        </form>
    </div>
</header>
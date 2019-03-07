<aside id="sidebar" class="bg-black w-1/2 md:w-1/6 lg:w-1/6 border-r hidden md:block lg:block">
    <ul class="list-reset flex flex-col">
        <li class=" w-full h-full py-3 px-2 border-l-4 border-brand">
            <a href="{{ route('admin.tours.index') }}"
               class="font-hairline hover:font-normal text-sm text-nav-item no-underline font-semibold text-white">
                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Tours
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b align-bottom">
        <li class="w-full h-full py-3 px-2">
            <form action="{{ route('auth.logout') }}">
                @method('post')
                <button type="submit" class=" font-hairline hover:font-normal text-sm text-nav-item no-underline font-semibold text-white">
                    Log Out
                </button>
            </form>
        </li>
    </ul>
</aside>

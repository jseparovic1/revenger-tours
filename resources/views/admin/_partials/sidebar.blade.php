<aside id="sidebar" class="bg-black w-1/2 md:w-1/6 lg:w-1/6 border-r hidden md:block lg:block">
    <ul class="list-reset flex flex-col admin__sidebar">
        {!! $adminMenu !!}
        <li class="w-full h-full py-3 px-2 border-b align-bottom">
        <li class="w-full h-full py-3 px-2">
            <form action="{{ route('auth.logout') }}" method="post">
                @csrf
                <button type="submit" class=" font-hairline hover:font-normal text-sm text-nav-item no-underline font-semibold text-white">
                    Log Out
                </button>
            </form>
        </li>
    </ul>
</aside>

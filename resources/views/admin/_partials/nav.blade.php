<header class="bg-black py-2">
    <div class="flex justify-between">
        <a class="p-1 mx-3 inline-flex" href="/">
            <span class="text-brand font-bold text-2xl">Revenger</span>
            <span class="text-white font-bold text-2xl">Tours</span>
        </a>
        <div class="p-1 flex flex-row">
            <a href="#" class="text-white p-2 no-underline hidden md:block lg:block">{{ Auth::user()->name }}</a>
        </div>
    </div>
</header>

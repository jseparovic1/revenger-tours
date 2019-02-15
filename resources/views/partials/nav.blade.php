<nav class="navigation text-center  pin-t pin-r pin-l z-20 absolute">
    <div class="flex justify-between items-center relative my-2 lg:my-0 max-w-5xl px-4 md:px-10 mx-auto">
        <div>
            <a href="/" class="link-reset">
                <span class="text-brand font-bold text-xl">Revenger</span>
                <span class="text-white font-bold text-xl">Tours</span>
            </a>
        </div>
        {!! $menu !!}
        <div class="lg:hidden nav-toggle">
            <input id="burger" type="checkbox"/>
            <label for="burger">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <nav>
                <div class="pt-2">
                    <span class="text-brand font-bold text-xl">Revenger</span>
                    <span class="text-white font-bold text-xl">Tours</span>
                </div>
                {!! $menuResponsive !!}
            </nav>
        </div>
    </div>
</nav>

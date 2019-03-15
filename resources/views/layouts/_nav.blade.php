<nav
    class="navigation text-center pin-t pin-r pin-l z-20 {{ isset($fixedOff) ? 'bg-black' : 'absolute'}}">
    <div class="flex justify-between items-center relative my-2 lg:my-0 max-w-3xl px-4 lg:px-0 mx-auto">
        <div>
            <a href="/" class="link-reset">
                <span class="text-brand font-bold text-2xl">Revenger</span>
                <span class="text-white font-bold text-2xl">Tours</span>
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
                    <span class="text-brand font-bold text-2xl">Revenger</span>
                    <span class="text-white font-bold text-2xl">Tours</span>
                </div>
                {!! $menuResponsive !!}
            </nav>
        </div>
    </div>
</nav>

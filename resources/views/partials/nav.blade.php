<nav class="navigation text-center  pin-t pin-r pin-l z-20 absolute">
    <div class="flex justify-between items-center relative my-2 lg:my-0 max-w-5xl px-4 md:px-10 mx-auto">
        <div>
            <a href="/" class="link-reset">
                <span class="text-brand font-bold text-xl">Revenger</span>
                <span class="text-white font-bold text-xl">Tours</span>
            </a>
        </div>
        {!! $menu->render() !!}
        {{--<ul class="hidden lg:flex list-reset text-white border-transparent">--}}
            {{--<li class="flex active hover:border-brand-dark border-b-4 border-transparent">--}}
                {{--<a href="#"--}}
                   {{--class="px-2 xl:px-5 py-5 mx-2 text-brand-dark tracking-wide font-bold">HOME</a>--}}
            {{--</li>--}}
            {{--<li class="flex hover:border-brand-dark border-b-4 border-transparent">--}}
                {{--<a href="#" class="px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold">TOURS</a>--}}
            {{--</li>--}}
            {{--<li class="flex hover:border-brand-dark border-b-4 border-transparent">--}}
                {{--<a href="#" class="px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold">PRIVATE--}}
                    {{--TOURS</a>--}}
            {{--</li>--}}
            {{--<li class="flex hover:border-brand-dark border-b-4 border-transparent">--}}
                {{--<a href="#" class="px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold">TRANSFERS</a>--}}
            {{--</li>--}}
            {{--<li class="flex hover:border-brand-dark border-b-4 border-transparent">--}}
                {{--<a href="#" class="px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold">CONTACT</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
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
                <ul class="list-reset">
                    <li><a href="#" class="hover:bg-brand-darkest hover:border-0">HOME</a></li>
                    <li><a href="#" class="hover:bg-brand-darkest hover:border-0">TOURS</a></li>
                    <li><a href="#" class="hover:bg-brand-darkest hover:border-0">PRIVATE TOURS</a></li>
                    <li><a href="#" class="hover:bg-brand-darkest hover:border-0">TRANSFERS</a></li>
                    <li><a href="#" class="hover:bg-brand-darkest hover:border-0">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </div>
</nav>

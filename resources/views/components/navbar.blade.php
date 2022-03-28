<div class="mrsmart-container navbar " x-data="{ showMobileNav: false }">
    <a href="/">
        <img src="{{ url('storage/icons/logo.svg') }}" alt="Mr Smart Logo">
    </a>

    <div class="mobile-nav" x-cloak x-show="showMobileNav" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">

        <img @click="showMobileNav = false" class="mobile-nav-close" src="{{ url('storage/icons/delete.svg') }}"
            alt="Mobile Menu Close">

        <ul>
            @guest
                <li class="nav-link" @click=" showMobileNav = ! showMobileNav">
                    <a href="/">Home</a>
                </li>
                <li class="nav-link" @click=" showMobileNav = ! showMobileNav">
                    <a href="/">Services</a>
                </li>
                <li class="nav-link" @click=" showMobileNav = ! showMobileNav">
                    <a href="/">Contact</a>
                </li>
            @endguest


            @auth
                <li class="nav-link" @click=" showMobileNav = ! showMobileNav">
                    <a href="/">Site</a>
                </li>
                <li class="nav-link" @click=" showMobileNav = ! showMobileNav">
                    <a href="#">Info</a>
                </li>
                <li class="nav-link  {{ request()->routeIs('messages') ? 'border-b border-accent' : '' }}"
                    @click=" showMobileNav = ! showMobileNav">
                    <a href="{{ route('messages') }}">Messages</a>
                </li>
                <li class="nav-link  {{ request()->routeIs('profile.show') ? 'border-b border-accent' : '' }}"
                    @click=" showMobileNav = ! showMobileNav">
                    <a href="{{ route('profile.show') }}">Profile</a>
                </li>



                <div class="user-info ">
                    <a class="user-name" href="{{ route('dashboard') }}">
                        {{ explode(' ', Auth::user()->name)[0] }}</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf()
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                </div>
            @endauth
        </ul>



    </div>

    @guest

        <nav>
            <ul @click.outside="showMobileNav = false">
                <li class="nav-link">
                    <a href="{{ request()->routeIs('welcome') ? '/#hero' : '/' }}">Home</a>
                </li>
                <li class="nav-link">
                    <a href="/#services">Services</a>
                </li>
                <li class="nav-link">
                    <a href="/#contact">Contact</a>
                </li>
            </ul>



            <img @click="showMobileNav = true" class="mobile-nav-open" src="{{ url('storage/icons/menu.svg') }}"
                alt="Mobile Menu Open">

        </nav>


        <div class="call-number group">
            <img id="call-icon" src="storage/icons/phone.svg" alt="Call Us Icon">
            <a id="call-us" class="group-hover:text-white" href="tel:+254113350588">Call Us {{ $siteInfo->phone }}</a>
        </div>
    @endguest


    @auth

        <span class="uppercase sm:hidden">Admin Dashboard</span>

        <nav class="admin-nav">
            <ul @click.outside="showMobileNav = false">
                <li class="nav-link">
                    <a href="/">Site</a>
                </li>
                <li class="nav-link {{ request()->routeIs('site-settings') ? 'border-b border-accent' : '' }}">
                    <a href="{{ route('site-settings') }}">Info</a>
                </li>
                <li class="nav-link  {{ request()->routeIs('messages') ? 'border-b border-accent' : '' }}">
                    <a href="{{ route('messages') }}">Messages</a>
                </li>
                <li class="nav-link  {{ request()->routeIs('profile.show') ? 'border-b border-accent' : '' }}">
                    <a href="{{ route('profile.show') }}">Profile</a>
                </li>
            </ul>



            <img @click="showMobileNav = true" class="mobile-nav-open" src="{{ url('storage/icons/menu.svg') }}"
                alt="Mobile Menu Open">

        </nav>


        <div class="user-info ">
            <a class="user-name" href="{{ route('dashboard') }}">
                Welcome,
                {{ explode(' ', Auth::user()->name)[0] }}</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf()
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    @endauth

</div>

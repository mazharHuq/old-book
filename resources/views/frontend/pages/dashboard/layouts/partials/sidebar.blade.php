<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dashboard-assets/dist/images/logo.svg') }}">
        <span class="hidden xl:block text-white text-lg ml-3">Old <span class="font-medium">Book Shop</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            {{-- <a href="index.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a> --}}
            <a href="{{ route('user') }}" class="side-menu
                                            @if (Request::is('*/user'))
                                            side-menu--active
                                            @endif"
            >
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            {{-- <a href="index.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a> --}}
            <a href="{{ route('user.book.index') }}" class="side-menu"
                                            @if (Request::is('*/books'))
                                            side-menu--active
                                            @endif
            >
                <div class="side-menu__icon"> <i data-feather="book"></i> </div>
                <div class="side-menu__title"> Books </div>
            </a>
        </li>
        <li>
            {{-- <a href="index.html" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a> --}}
            <a href="{{ route('user.chat.index') }}" class="side-menu"
                                            @if (Request::is('*/chat'))
                                            side-menu--active
                                            @endif
            >
                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li>



        <li class="side-nav__devider my-6"></li>



    </ul>
</nav>

<section data-bs-version="5.1" class="menu menu2 cid-tJS6tZXiPa" once="menu" id="menu02-1i">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="/">
                        <img src="/assets/images/sitelogo.webp" alt="Mobirise Website Builder" style="height: 3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-4"
                        href="/">PawsInMotion</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse"
                data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black text-primary display-4"
                            href="index.html#header01-7">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black text-primary display-4" href="index.html#features04-w"
                            aria-expanded="false">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black text-primary display-4"
                            href="index.html#contacts02-9">Contacts</a>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn">
                    @guest
                        <a class="btn btn-primary display-4  {{ (request()->is('login')) ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>

                        <a class="btn btn-primary display-4  {{ (request()->is('register')) ? 'active' : '' }}"
                            href="{{ route('register') }}">Register</a>

                    @else
                        <a class="btn btn-primary display-4  dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('register_dogs') }}">Register
                                    Your Dogs</a></li>
                            <li><a class="dropdown-item" href="{{ route('book_appointment') }}">Make
                                    Appointments</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</section>
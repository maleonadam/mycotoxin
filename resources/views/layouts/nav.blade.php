<nav class="mynav">
    <div class="navLinks" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li><a href="{{ route('aboutus') }}">About</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li><a href="{{ route('charter') }}">Service Charter</a></li>
            <li class="dropdown">
                <div class="dropdown">
                    <a href="#" class="nav-link">Publications</a>
                    <div class="dropdown-content bg-dark">
                        <a href="{{ route('service_charter') }}">Service charter</a>
                        <a href="{{ route('credit_cert') }}">Accreditation certificate</a>
                    </div>
                </div>
            </li>
            <li><a href="{{ route('contactus') }}">Contacts</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @else
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                        <div class="dropdown-content bg-dark">
                            <a href="{{ url('/useraccount') }}">Profile</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
</nav>
<header>
    <nav>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">Posts</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('posts.create') }}">Create</a>
                </li>
            @endauth
            @guest
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endguest
            @auth
                <li>
                    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="document.getElementById('logoutForm').submit();">Logout</a>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

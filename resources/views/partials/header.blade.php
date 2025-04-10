<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Home</a></li>
                <li class="dropdown show">
                    <a class="nav-link px-2 link-dark dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="#">{{$category->name}} <span class="rounded-circle text-primary">{{$category->posts_count}}</span></a>
                        @endforeach

                    </div>
                </li>
                @auth
                    <li class="dropdown show">
                        <a class="nav-link px-2 link-dark dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="#">Edit profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('posts.create') }}">Create post</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item link-danger"
                                    href="{{ route('logout') }}">Logout</button>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>

            <form method="POST" action="{{ route('posts.search') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            @guest
                <ul class="nav text-end">
                    <li><a class="nav-link px-2 link-dark" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link px-2 link-dark" href="{{ route('register') }}">Register</a></li>
                </ul>
            @endguest

        </div>
    </div>
</header>

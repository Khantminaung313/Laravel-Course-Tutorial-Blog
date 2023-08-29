<nav class="navbar navbar-dark bg-dark d-flex align-items-center">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="/" class="nav-link">Home</a>
            @auth
                @can('admin')
                <a href="/admin/blogs" class="nav-link">Dashboard</a>
                @endcan
            @endauth

            @guest
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @else
                <a href="/profile"><img src="{{ auth()->user()->avatar }}" height="50" width="50"
                        class="rounded-circle" alt=""></a>
                <a href="/profile" class="nav-link">{{ auth()->user()->name }}</a>

                <form action="/logout" method="POST">
                    @csrf
                    <button class="nav-link btn btn-link" type="submit">Logout</button>
                </form>
            @endguest
            <a href="/#blogs" class="nav-link">Blogs</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>

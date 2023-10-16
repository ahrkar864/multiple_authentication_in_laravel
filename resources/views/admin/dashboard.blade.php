<!-- resources/views/layouts/app.blade.php -->

<!-- ... your existing HTML code ... -->

<ul class="navbar-nav ml-auto">
    <!-- other navigation items -->

    @auth('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endauth
</ul>

<!-- ... more HTML code ... -->

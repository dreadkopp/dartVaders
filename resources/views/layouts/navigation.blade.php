<div class="menu-area">
    <div class="limit-box">
        <nav class="main-menu">
            <ul class="menu-area-main">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/about">Über uns</a>
                </li>
                <li>
                    <a href="blog.html">Blog</a>
                </li>
                <li>
                    <a href="/shop">Shop</a>
                </li>
                <li>
                    <a href="/guestbook">Gästebuch</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="/kalender">Kalender</a>
                    </li>
                    <li>
                        <a href="/scores">Scoreboard</a>
                    </li>
                    <li>
                        <a href="/penalty">Strafen</a>
                    </li>
                    @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="/Admin">Admin</a>
                    </li>
                    @endif
                    <li>
                        <a href="/logoff">Logout</a>
                    </li>
                @else
                <li>
                    <a href="/login">Login</a>
                </li>
                    @endif
            </ul>
        </nav>
    </div>
</div>

<div class="menu-area">
    <div class="limit-box">
        <nav class="main-menu">
            <ul class="menu-area-main">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/page/about">Über uns</a>
                </li>
                <li>
                    <a href="/blog">Blog</a>
                </li>
                <li>
                    <a href="/shop">Shop</a>
                </li>
                <li>
                    <a href="/galery">Bilder</a>
                </li>
                <li>
                    <a href="/visitors">Gästebuch</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="/events">Kalender</a>
                    </li>
                    <li>
                        <a href="/scores">Scoreboard</a>
                    </li>
                    <li>
                        <a href="/penalty">Strafen</a>
                    </li>
                    @if(Auth::user()->hasRole('admin'))
                    <li>
                        <a href="/admin">Admin</a>
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

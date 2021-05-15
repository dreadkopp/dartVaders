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
                    <a href="/shop">Shop</a>
                </li>
                <li>
                    <a href="/guestbook">Gästebuch</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li>
                        <a href="/login">Kalender</a>
                    </li>
                    <li>
                        <a href="/login">Scoreboard</a>
                    </li>
                    <li>
                        <a href="/login">Strafen</a>
                    </li>
                    <li>
                        <a href="/logout">Logout</a>
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

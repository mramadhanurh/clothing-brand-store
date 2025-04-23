<!-- #HEADER -->

<header class="header" data-header>
    <div class="container">

        <div class="overlay" data-overlay></div>

        <form action="{{ url('searchproduct') }}" method="POST">
            @csrf
            <div class="header-search">
                <input type="search" id="search_product" name="nama_produk" placeholder="Search Product..." class="input-field">

                <button type="submit" class="search-btn" aria-label="Search">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
        </form>

        <a href="#" class="logo">
            <img src="{{ asset('template_frontend/assets/images/logo.svg') }}" alt="Casmart logo" width="130" height="31">
        </a>

        <div class="header-actions">

            @auth
                @if (Auth::user()->is_admin == 1)
                    <a href="{{ url('/admin') }}" class="header-action-btn">
                        <ion-icon name="person-outline" aria-hidden="true" style="color: black;"></ion-icon>
                        <p class="header-action-label">Dashboard Admin</p>
                    </a>
                @else
                    <a href="{{ url('/home') }}" class="header-action-btn">
                        <ion-icon name="person-outline" aria-hidden="true" style="color: black;"></ion-icon>
                        <p class="header-action-label">My Home</p>
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="header-action-btn">
                    <ion-icon name="person-outline" aria-hidden="true" style="color: black;"></ion-icon>
                    <p class="header-action-label">Sign in</p>
                </a>
            @endauth

            <button class="header-action-btn">
                <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

                <p class="header-action-label">Search</p>
            </button>

            <a href="{{ url('cart') }}" class="header-action-btn">
                <ion-icon name="cart-outline" aria-hidden="true" style="color: black;"></ion-icon>
                <p class="header-action-label">Cart</p>
                <div class="btn-badge green cart-count" aria-hidden="true">0</div>
            </a>

            <!-- <button class="header-action-btn">
                <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>

                <p class="header-action-label">Wishlisht</p>

                <div class="btn-badge" aria-hidden="true">2</div>
            </button> -->

        </div>

        <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">

                <a href="#" class="logo">
                    <img src="./assets/images/logo.svg" alt="Casmart logo" width="130" height="31">
                </a>

                <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                    <ion-icon name="close-outline"></ion-icon>
                </button>

            </div>

            <ul class="navbar-list">

                <li>
                    <a href="{{ url('/') }}" class="navbar-link">Home</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Shop</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">About</a>
                </li>

                <li>
                    <a href="#" class="navbar-link">Contact</a>
                </li>

            </ul>

        </nav>

    </div>
</header>
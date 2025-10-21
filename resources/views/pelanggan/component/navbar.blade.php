<style>
    /* CSS for fixed navbar */
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1030; /* Ensure it is above other elements */
    }

    /* Add padding to the top of the body to prevent content from being hidden behind the navbar */
    body {
        padding-top: 70px; /* Adjust based on your navbar height */
    }

    /* Additional styling for the active links */
    .navbar-nav .nav-link.active {
        color: #ffffff; /* Change the color of the active link */
        font-weight: bold; /* Make the active link bold */
    }

    /* Styling for the user dropdown */
    .select {
        position: relative;
        cursor: pointer;
    }

    .links-login {
        display: none;
        position: absolute;
        top: 60px; /* Adjust based on your navbar height */
        right: 0;
        background-color: #025464;
        padding: 10px;
        border-radius: 5px;
    }

    .links-login.activeLogin {
        display: block;
    }

    /* Styling for the notification circles */
    .notif .circle {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 5px;
        font-size: 12px;
    }

    /* Responsive adjustments */
    @media (max-width: 991.98px) {
        .navbar .container {
            padding-left: 10px;
            padding-right: 10px;
        }
        .select {
            width: 100%;
        }
        .links-login {
            top: 50px;
            right: 10px;
        }
    }
</style>
<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #025464">
    <div class="container">
        <a class="navbar-brand" href="/">iJabu Coffee</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'shop' ? 'active' : '' }}" href="/shop">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'contact' ? 'active' : '' }}" href="/contact">About
                        Us</a>
                </li>
                @auth
                    <div class="select" tabindex="0" role="button">
                        <div class="text-links">
                            <div class="d-flex gap-2 align-items-center">
                                <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" class="rounded-circle"
                                    style="width: 50px;" alt="">
                                <div class="d-flex flex-column text-white">
                                    <p class="m-0" style="font-weight: 700; font-size:15px; padding-top:9px;">{{ Auth::user()->name }}
                                    </p>
                                    <p class="m-0" style="font-size:12px"></p>
                                </div>
                            </div>
                        </div>
                        <div class="links-login text-white" id="links-login">
                            <a href="logout_pelanggan" style="text-decoration: none" role="button"
                                tabindex="0">Keluar</a>
                        </div>
                    </div>
                @else
                    <li class="nav-item">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Login | Register</button>
                    </li>
                @endauth
                <li class="nav-item">
                    <div class="notif">
                        <a href="/transaksi" class="fs-5 nav-link {{ Request::path() == 'transaksi' ? 'active' : '' }}">
                            <i class="fa fa-bag-shopping"></i>
                        </a>
                        @if ($count)
                            <div class="circle">{{ $count }}</div>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <div class="notif">
                        <a href="/checkOut" class="fs-5 nav-link {{ Request::path() == 'checkOut' ? 'active' : '' }}">
                            <i class="fa fa-cash-register"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    $(".text-links").click(function(e) {
        e.preventDefault();
        var $linksLogin = $("#links-login");
        if ($linksLogin.hasClass("activeLogin")) {
            $linksLogin.removeClass("activeLogin");
        } else {
            $linksLogin.addClass("activeLogin");
        }
    });

    $(document).ready(function() {
        $(".text-links").click(function(e) {
            e.preventDefault();
            var $linksLogin = $("#links-login");
            if ($linksLogin.hasClass("activeLogin")) {
                $linksLogin.removeClass("activeLogin");
            } else {
                $linksLogin.addClass("activeLogin");
            }
        });
    });
</script>

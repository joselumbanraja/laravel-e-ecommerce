<style>
    /* General Styles */
nav {
    background-color: white;
    padding: 1rem;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
    display: flex;
    justify-content: space-between;
}

.icon-notif {
    margin-right: 1rem;
}

nav img {
    width: 50px;
    border-radius: 50%;
}

nav .d-flex {
    display: flex;
    align-items: center;
}

nav .gap-2 {
    gap: 0.5rem;
}

nav .flex-column {
    display: flex;
    flex-direction: column;
}

nav p {
    margin: 0;
    font-weight: 700;
    font-size: 24px;
}

/* Responsive Styles */
@media (max-width: 992px) {
    nav {
        flex-direction: column;
        align-items: center;
    }

    .icon-notif {
        margin: 0 0 1rem 0;
    }

    nav img {
        width: 40px;
    }

    nav p {
        font-size: 20px;
        text-align: center;
    }

    nav .d-flex {
        flex-direction: column;
    }

    nav .gap-2 {
        gap: 0.25rem;
    }
}

@media (max-width: 768px) {
    nav img {
        width: 30px;
    }

    nav p {
        font-size: 18px;
    }

    nav .d-flex {
        align-items: center;
        flex-direction: column;
    }

    nav .gap-2 {
        gap: 0.25rem;
        flex-direction: column;
    }
}

@media (max-width: 576px) {
    nav img {
        width: 25px;
    }

    nav p {
        font-size: 16px;
    }

    nav .d-flex {
        align-items: flex-start;
        flex-direction: column;
    }

    nav .gap-2 {
        gap: 0.25rem;
        flex-direction: column;
        align-items: center;
    }

    nav .flex-column {
        align-items: center;
    }
}

</style>
<nav class="mb-3 d-flex justify-content-lg-between bg-white p-2 rounded">
    <div class="d-flex align-items-center">
        <div class="icon-notif">
        </div>
        <div class="d-flex gap-2 align-items-center">
            <img src="{{ asset('storage/user/'. Auth::user()->foto) }}" class="rounded-circle" style="width: 50px;" alt="">
            <div class="d-flex flex-column">
                <p class="m-0" style="font-weight: 700; font-size:24px;">Selamat Datang Di Halaman Admin, ({{Auth::user()->name}})</p>
            </div>
        </div>
    </div>
</nav>

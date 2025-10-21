@extends('pelanggan.layout.index')

@section('content')
<style>
.backs {
    background: linear-gradient(to right, #4e342e, #3e2723);
    color: #fff;
    text-align: center;
    padding: 80px 20px;
    border-radius: 0 0 40px 40px;
}
.backs h1 {
    font-size: 2.5rem;
    font-weight: bold;
}
.backs h4 {
    font-size: 1.2rem;
    font-weight: 400;
    margin-top: 10px;
    opacity: 0.9;
}

#filterResult {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
    justify-content: center;
    width: 100%;
}

.card {
    border: none;
    border-radius: 15px;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
}

.card-header img {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

.card-body p {
    font-size: 0.95rem;
    text-align: center;
    font-weight: 500;
}

.card-footer {
    background-color: #fafafa;
    border-top: none;
}

.add-to-cart-button {
    font-size: 20px;
    color: #007bff;
    border-color: #007bff;
    transition: 0.3s;
}
.add-to-cart-button:hover {
    background-color: #007bff;
    color: #fff;
}

@media (max-width: 768px) {
    .backs h1 {
        font-size: 1.8rem;
    }
    .backs h4 {
        font-size: 1rem;
    }
    .card {
        max-width: 180px;
        margin: auto;
    }
}

.modal-content {
    border-radius: 15px;
}
.modal-body .form-control {
    border-radius: 10px;
}
.modal-header {
    background-color: #f5f5f5;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
</style>

<div class="backs" data-aos="fade-down">
    <h1>Pusat Produk Ijabu</h1>
    <h4>"Ijabu: Karena Kadang, Sarapan Cuma Perlu Kopi dan Wifi Gratis!"</h4>
</div>

<div class="container mt-5 mb-5">
    <div id="filterResult" data-aos="fade-up" data-aos-duration="1200">
        @if ($data->isEmpty())
            <h1>Belum ada produk ...!</h1>
        @else
            @foreach ($data as $p)
            <div class="card">
                <div class="card-header m-auto">
                    <img src="{{ asset('storage/product/' . $p->foto) }}" alt="produk"
                        style="width: 100%; height: 150px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <p>{{ $p->nama_product }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="m-0" style="font-size: 15px; font-weight: 600;">
                        <span>IDR </span>{{ number_format($p->harga) }}
                    </p>
                    <form action="{{ route('addTocart') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="idProduct" value="{{ $p->id }}">
                        <button type="submit" class="btn btn-outline-primary add-to-cart-button">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

<!-- ===== MODAL LOGIN ===== -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-warning text-center">
                    Silahkan login terlebih dahulu sebelum masuk ke proses!
                </div>
                <form action="{{ route('loginproses.pelanggan') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Masukan email Anda">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukan password Anda">
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-2">Login</button>
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#registerModal">Register</button>
                    <p class="text-center mt-2" style="font-size:12px;">Belum punya akun? Daftar sekarang!</p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.add-to-cart-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: "GET",
            url: "{{ route('checkLogin') }}",
            success: function(response) {
                if (response.authenticated) {
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function() {
                            window.location.href = "{{ route('shop') }}";
                        },
                        error: function() {
                            console.error("Terjadi kesalahan saat menambahkan produk ke keranjang.");
                        }
                    });
                } else {
                    $('#exampleModal').modal('show');
                }
            }
        });
    });
});
</script>
@endsection

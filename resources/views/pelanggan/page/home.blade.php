@extends('pelanggan.layout.index')

@section('content')
<style>
body {
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

.hero {
    background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),
                url('{{ asset('assets/images/homes.jpg') }}') center/cover no-repeat;
    color: white;
    text-align: center;
    padding: 120px 20px;
}

.hero h2 {
    font-size: 2.8rem;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.3rem;
    margin-bottom: 25px;
}

.hero .btn {
    padding: 12px 25px;
    background-color: #ffb347;
    color: #000;
    font-weight: 600;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
}

.hero .btn:hover {
    background-color: #ffa600;
}

.why-choose-section {
    padding: 5rem 1rem;
    background-color: #fffdf8;
}

.why-choose-section .container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 3rem;
}

.why-choose-section .section-title {
    font-size: 2rem;
    margin-bottom: 20px;
}

.why-choose-section p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #333;
}

.feature {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: 0.3s ease;
}

.feature:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.feature h3 {
    font-size: 1.2rem;
    margin-top: 10px;
    color: #333;
}

.feature p {
    font-size: 0.95rem;
    color: #555;
}

.product-section {
    background-color: #fff;
    padding: 60px 15px;
}

.section-title {
    font-size: 2rem;
    font-weight: bold;
    color: #222;
}

.product-item {
    position: relative;
    display: block;
    text-align: center;
    transition: transform 0.3s ease;
}

.product-item:hover {
    transform: scale(1.05);
}

.content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1.5rem;
    justify-items: center;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-body {
    padding: 15px;
}

.card-body p {
    font-size: 1rem;
    margin-bottom: 5px;
    text-align: center;
}

.card-footer {
    background-color: #f8f9fa;
    padding: 10px 15px;
    text-align: center;
}

.btn-primary {
    background-color: #ffb347;
    border: none;
    color: #000;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
}

.btn-primary:hover {
    background-color: #ffa600;
    color: #fff;
}

.promo-container {
    text-align: center;
    background-color: #f9f9f9;
    padding: 50px 20px;
    border-radius: 10px;
    margin: 50px auto;
}

.promo-heading {
    font-size: 2rem;
    color: #222;
    margin-bottom: 10px;
}

.promo-text {
    color: #555;
    font-size: 1.1rem;
}

/* Bagian Responsive */
@media (max-width: 992px) {
    .hero h2 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1.1rem;
    }

    .why-choose-section .container {
        flex-direction: column;
        text-align: center;
    }

    .why-choose-section img {
        max-width: 80%;
        margin: 0 auto;
    }

    .card {
        max-width: 250px;
    }
}

@media (max-width: 576px) {
    .hero {
        padding: 100px 10px;
    }

    .hero h2 {
        font-size: 1.8rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .promo-heading {
        font-size: 1.6rem;
    }

    .promo-text {
        font-size: 0.95rem;
    }
}
</style>

<section id="home" class="hero">
    <div class="container">
        <h2>Welcome to Our Coffee Shop</h2>
        <p>Experience the best coffee in town</p>
        <a href="{{ route('shop') }}" class="btn">Explore Our Menu</a>
    </div>
</section>

<div class="why-choose-section">
    <div class="container">
        <div class="col-lg-6">
            <h2 class="section-title">Kenapa Memilih Kami..?</h2>
            <p>"Kami menawarkan website inovatif, responsif, dan mudah digunakan. Didukung tim profesional yang siap membantu kesuksesan Anda secara online dengan desain menarik dan fungsionalitas unggul."</p>

            <div class="row my-5">
                <div class="col-12 col-md-6 mb-4">
                    <div class="feature">
                        <span class="material-symbols-outlined">two_wheeler</span>
                        <h3>Pengiriman Cepat & Hemat Ongkos</h3>
                        <p>Nikmati pengiriman cepat dengan biaya hemat, pesanan Anda sampai tanpa menunggu lama.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="feature">
                        <span class="material-symbols-outlined">local_shipping</span>
                        <h3>Belanja Enteng</h3>
                        <p>Belanja enteng, dompet senang! Temukan penawaran hebat setiap saat.</p>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="feature">
                        <span class="material-symbols-outlined">support_agent</span>
                        <h3>24/7 Support</h3>
                        <p>Dukungan pelanggan siap membantu Anda setiap waktu.</p>
                        <li>Contact WA: +62 838 7491 8283</li>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="feature">
                        <span class="material-symbols-outlined">credit_card_heart</span>
                        <h3>Penawaran Terbaik</h3>
                        <p>Jangan lewatkan harga spesial dan promo eksklusif kami.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="img-wrap">
                <img src="{{ asset('assets/images/hom.png') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<div class="promo-container" data-aos="fade-up">
    <h1 class="promo-heading">Temukan Produk Terbaik Kami!</h1>
    <p class="promo-text">Beli sekarang dan nikmati penawaran spesial hanya untuk Anda!</p>
</div>

<div class="container">
    @if ($best->count() > 0)
    <h4 class="mt-5">Best Seller</h4>
    <div class="content mt-3 mb-5">
        @foreach ($best as $b)
        <div class="card">
            <img src="{{ asset('storage/product/' . $b->foto) }}" alt="Product">
            <div class="card-body">
                <p>{{ $b->nama_product }}</p>
                <p><i class="fa-regular fa-star"></i> 5+</p>
            </div>
            <div class="card-footer">
                <p style="font-size: 16px; font-weight: 600;"><span>IDR </span>{{ number_format($b->harga) }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <h4 class="mt-5" style="color: rgb(255, 208, 67)">New Product</h4>
    <div class="content mt-3 mb-5">
        @php
            $data = App\Models\Product::orderBy('created_at', 'desc')->take(4)->get();
        @endphp
        @foreach ($data as $p)
            <div class="card" data-aos="fade-up">
                <img src="{{ asset('storage/product/' . $p->foto) }}" alt="coffee 1">
                <div class="card-body">
                    <p>{{ $p->nama_product }}</p>
                </div>
                <div class="card-footer">
                    <p style="font-size: 16px; font-weight: 600;"><span>IDR </span>{{ number_format($p->harga) }}</p>
                </div>
            </div>
        @endforeach

        @if ($data->count() > 3)
            <div class="text-center mt-4">
                <a href="{{ route('shop') }}" class="btn-primary">Lihat Selengkapnya...</a>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('pelanggan.layout.index')

@section('content')
<style>
body {
    background-color: #fafafa;
    color: #333;
    font-family: 'Poppins', sans-serif;
}

h2, h4 {
    font-weight: 600;
}

.row.mt-4.align-items-center {
    background: linear-gradient(135deg, #fefefe 0%, #f8f8f8 100%);
    border-radius: 20px;
    padding: 40px 20px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.05);
}

.content-text {
    line-height: 1.7;
    font-size: 16px;
    color: #555;
    text-align: justify;
}

.content-text h2 {
    color: #523a28;
}

.row.mt-4 img {
    width: 100%;
    border-radius: 20px;
    transition: transform 0.4s ease;
}

.row.mt-4 img:hover {
    transform: scale(1.03);
}

.d-flex.justify-content-lg-between {
    flex-wrap: wrap;
    gap: 20px;
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.d-flex.justify-content-lg-between p {
    font-weight: 500;
    color: #3c3c3c;
}

.galery {
    padding: 40px 15px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.05);
    margin-top: 30px;
}

.galery h4 {
    text-align: center;
    margin-bottom: 30px;
    color: #523a28;
    font-weight: 700;
}

.card-galery {
    border: none;
    overflow: hidden;
    border-radius: 15px;
    transition: all 0.4s ease;
    box-shadow: 0 5px 10px rgba(0,0,0,0.08);
}

.card-galery:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12);
}

.card-galery img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    border-radius: 15px;
}

iframe {
    width: 100%;
    height: 400px;
    border: none;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
}

@media (max-width: 992px) {
    .row.mt-4.align-items-center {
        text-align: center;
    }

    .row.mt-4 img {
        width: 85%;
        margin: 0 auto;
        display: block;
    }

    .content-text {
        font-size: 15px;
        padding: 10px;
    }

    .card-galery img {
        height: 250px;
    }

    iframe {
        height: 300px;
    }
}

@media (max-width: 576px) {
    .row.mt-4.align-items-center {
        padding: 20px 10px;
    }

    h2, h4 {
        font-size: 18px;
    }

    .content-text {
        font-size: 14px;
    }

    .d-flex.justify-content-lg-between {
        flex-direction: column;
        align-items: flex-start;
    }

    .galery {
        padding: 25px 10px;
    }
}
</style>

<div class="row mt-4 align-items-center">
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="content-text">
            <h2>History Sumatera Coffee...</h2>
            <hr>
            Hallo, selamat datang di website kami ☕!<br>
            Saat ini, <b>iJabu Coffee</b> telah melakukan <span class="text-primary">#Colaboration</span> bersama <b>@VapeTownBalige</b>.  
            Semoga kolaborasi ini bertahan lama ya, guys!
        </div>
    </div>
    <div class="col-md-6 text-center" data-aos="fade-left">
        <img src="{{ asset('assets/images/gacor.jpg') }}" alt="iJabu" class="img-fluid shadow-lg">
    </div>

    <div class="col-md-6 mt-5" data-aos="fade-right">
        <img src="{{ asset('assets/images/history.png') }}" alt="History" class="img-fluid shadow-lg">
    </div>
    <div class="col-md-6 mt-4">
        <div class="content-text">
            <h2>History From Sumatera Coffee...</h2>
            <hr>
            Sudah dikenal luas bahwa Indonesia adalah negara makmur dengan sumber daya alam yang melimpah — salah satunya adalah kopi ☕. 
            Kopi Indonesia terkenal di seluruh dunia karena cita rasanya yang kaya dan khas, menjadikan Indonesia salah satu dari lima produsen kopi dunia teratas 🌏.  
            <br><br>
            <b>Kopi Sumatera</b> adalah salah satu kopi premium legendaris dunia.  
            Sumatera merupakan salah satu tempat pertama di mana kopi ditanam dalam skala besar, menjadikan Indonesia salah satu negara penghasil kopi terbesar di dunia
            <br><br>
            Jadi, inilah kisah bagaimana Kopi Sumatera menjadi salah satu minuman terbaik dunia.
        </div>
    </div>
</div>

<div class="d-flex justify-content-lg-between mt-5" data-aos="fade-up" data-aos-duration="3000">
    <div class="d-flex align-items-center gap-3">
        <i class="fa fa-users fa-2x text-primary"></i>
        <p class="m-0 fs-5">+300 Pelanggan</p>
    </div>
    <div class="d-flex align-items-center gap-3">
        <i class="fas fa-home fa-2x text-success"></i>
        <p class="m-0 fs-5">+500 Seller</p>
    </div>
    <div class="d-flex align-items-center gap-3">
        <i class="fas fa-mug-hot fa-2x text-danger"></i>
        <p class="m-0 fs-5">+300 Produk</p>
    </div>
</div>

<section class="galery mt-5" data-aos="fade-up" data-aos-duration="3000">
    <h4>Galeri iJabu Coffee</h4>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @for ($i = 1; $i <= 8; $i++)
            <div class="col">
                <div class="card-galery" data-aos="zoom-in" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/lock' . $i . '.jpg') }}" class="card-img-top" alt="Gallery {{ $i }}">
                </div>
            </div>
        @endfor
    </div>

    <div class="mt-5 mx-auto" style="max-width:700px;" data-aos="fade-up" data-aos-duration="3000">
        <h4 class="text-center mt-md-5 mb-md-2">Location iJabu Coffee</h4>
        <hr>
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d651.423738304327!2d99.06515733150644!3d2.33333602574498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0579426f5457%3A0xcccd388a131623e6!2sijabu%20Coffee%20%26%20Roastery!5e0!3m2!1sen!2sid!4v1715052343997!5m2!1sen!2sid"
            allowfullscreen="" loading="lazy">
        </iframe>
    </div>
</section>

<hr class="my-5">
@endsection

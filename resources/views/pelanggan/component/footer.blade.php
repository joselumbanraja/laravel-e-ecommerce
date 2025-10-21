<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding-top: 1rem;
            margin-top: 1.25rem;
        }

        .title-left, .title-middle, .title-sosmed {
            width: 30%;
        }   

        .header-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            font-weight: bolder;
        }

        .list-unstyled {
            list-style: none;
            padding: 0;
        }

        .list-unstyled li {
            margin-bottom: 0.5rem;
        }

        .sosmed a {
            color: white;
        }

        .sosmed i {
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
                align-items: center;
                gap: 2rem;
            }

            .title-left, .title-middle, .title-sosmed {
                width: 100%;
                text-align: center;
            }

            .sosmed {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .header-title {
                font-size: 1rem;
            }

            .sosmed i {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="title-left">
            <div class="header-title">
                IJABU COFFEE ROASTERY
            </div>
            <p>"Terkoneksi dengan aroma, rasa, dan cerita kopi di Ijabu Coffee! Selamat datang di ruang virtual kami, tempat di mana kenikmatan kopi berkumpul dalam setiap cangkir. 
                Kami hadir untuk mengajak Anda dalam perjalanan unik melalui dunia kopi yang penuh dengan keajaiban. Selamat menikmati pengalaman eksklusif kami!</p>
        </div>
        <div class="title-middle">
            <div class="header-title">
                CONTACT US
            </div>
            <ul class="list-unstyled">
                <li>
                    <p class="fas fa-phone">+823874918283</p>
                </li>
                <li>
                    <p class="fas fa-envelope">ijabucoffee@gmail.com</p>
                </li>
                <li>
                    <p class="fas fa-map-marker-alt">Balige, Sumatera Utara</p>
                </li>
            </ul>
        </div>
        <div class="title-sosmed">
            <div class="header-title">
                Sosial Media
            </div>
            <div class="sosmed d-flex gap-3">
                <a href="https://www.instagram.com/ijabu.co/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://web.facebook.com/profile.php?id=100089664140037"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
</body>
</html>
</form>
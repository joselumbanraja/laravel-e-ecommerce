@extends('admin.layout.index')

@section('content')
    <div class="d-flex flex-wrap gap-3">
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded" style="font-size:22px; color:green; background-color:#A6FF96">
                        inventory
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Total Product</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $totalProduct }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#D80032; background-color:#F78CA2">
                        view_in_ar
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Total Stock</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $sumStock }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#088395; background-color:#7ED7C1">
                        shopping_cart
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Transaksi</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ $dataTransaksi }}</span>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded"
                        style="font-size:22px; color:#FFC436; background-color:#F4F27E">
                        payments
                    </span>
                    <h5 class="p-0 m-0" style="color:green">Penghasilan</h5>
                </div>
                <span class="fs-2 p-0 m-0">{{ number_format($dataPenghasilan / 1000000, 2) . ' Jt' }}</span>
            </div>
        </div>
        <div class="card" style="width: 150px;">
            <div class="card-body">
                <div class="d-flex gap-2 align-items-center justify-start">
                    <span class="material-icons p-1 rounded" style="font-size:22px; color:#1b2dce; background-color:#f5f5f5">
                        manage_accounts
                    </span>
                    <h5 class="p-0 m-0" style="color:green"> Users</h5>
                </div>
                <span class="fs-2 p-0 m-0">7 Users</span>
            </div>
        </div>
    </div>
    <br>
    <div class="abouts" style="text-align: center;">
        <h2>Data Penjualan</h2>
    </div>
    <div class="card mt-2">
        <canvas id="myChart" style="height: 50vh;"></canvas>
        <hr>
        <li>Bagian Total Product diatas adalah banyaknya jenis barang yang sudah kita tambahkan kedalam website/kita pasarkan.</li>
        <li>Bagian Total Stock diatas adalah banyaknya stok yang masih tersedia dari semua product yang sudah di pasarkan.</li>
        <li>Bagian Transaksi diatas merupakan bagian yang memberikan informasi berapa banyak transaksi yang sudah dilakukan pada website kita.</li>
        <li>Bagian Penghasilan diatas untuk memberikan informasi mengenai product yang sudah terjual dan terbayar.</li>
    </div>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Transaksi',
                    data: [12 , 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                    borderWidth: 2,
                    fill: false,
                    borderColor: 'black',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

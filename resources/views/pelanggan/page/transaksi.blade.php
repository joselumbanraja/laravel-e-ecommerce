@extends('pelanggan.layout.index')

@section('content')
<style>
    /* === GLOBAL STYLES === */
    body {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .card-body {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 15px;
    }

    .desc {
        flex: 1;
        min-width: 220px;
    }

    img {
        object-fit: cover;
        border-radius: 10px;
    }

    h3 {
        font-weight: 700;
        color: #2c3e50;
    }

    /* Buttons */
    .btn-success {
        background-color: #2ecc71;
        border: none;
    }

    .btn-success:hover {
        background-color: #27ae60;
    }

    .btn-danger {
        border-radius: 10px;
    }

    /* Quantity Buttons */
    .plus,
    .minus {
        width: 36px;
        height: 36px;
        color: white;
        font-size: 18px;
        cursor: pointer;
        background-color: #6c757d;
        transition: background-color 0.3s;
    }

    .plus:hover,
    .minus:hover {
        background-color: #495057;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .card-body {
            flex-direction: column;
            text-align: center;
        }

        img {
            width: 100%;
            height: auto;
        }

        .qty {
            width: 60px !important;
        }

        .desc p {
            font-size: 18px;
        }
    }

    @media (max-width: 480px) {
        h3 {
            font-size: 22px;
        }

        .plus,
        .minus {
            width: 30px;
            height: 30px;
        }
    }

    /* Ekspedisi Card */
    .ekspedisi {
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    /* Grand Total */
    #grand-total {
        color: #e67e22;
        font-weight: 700;
        font-size: 20px;
    }

    /* SweetAlert Styling */
    .swal2-popup {
        border-radius: 15px !important;
    }
</style>

<div class="container mt-4 mb-5">
    <h3 class="text-center mb-4">🛒 Keranjang Belanja</h3>

    @if ($count == 0)
        <p class="text-center text-muted">Keranjang belanja kosong.</p>
    @else
        <div class="row g-3">
            @foreach ($data as $x)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <form action="{{ route('checkout.product', ['id' => $x->id]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="checkbox" class="select-product me-2" name="selected_products[]" value="{{ $x->id }}">
                            </div>

                            <img src="{{ asset('storage/product/' . $x->product->foto) }}" class="img-fluid mb-3" alt="{{ $x->product->nama_product }}">

                            <div class="desc">
                                <p class="mb-2">{{ $x->product->nama_product }}</p>
                                <input type="hidden" name="idBarang[{{ $x->id }}]" value="{{ $x->product->id }}">
                                <input type="number" class="form-control border-0 fw-bold fs-5 mb-2 text-center" name="harga[{{ $x->id }}]" id="harga-{{ $x->id }}" value="{{ $x->product->harga }}" readonly>

                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <button type="button" class="minus" data-id="{{ $x->id }}" {{ $x->qty <= 1 ? 'disabled' : '' }}>-</button>
                                    <input type="number" name="qty[{{ $x->id }}]" class="form-control text-center mx-2 qty" id="qty-{{ $x->id }}" value="{{ $x->qty }}" style="width: 70px;">
                                    <button type="button" class="plus" data-id="{{ $x->id }}">+</button>
                                </div>

                                <div class="text-center mb-2">
                                    <label class="fw-semibold">Total:</label>
                                    <input type="text" class="form-control text-center border-0 total d-inline-block w-50" name="total[{{ $x->id }}]" readonly id="total-{{ $x->id }}">
                                </div>

                                <form action="{{ route('cart.destroy', $x->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger w-100 delete-button">
                                        <i class="fa fa-trash-alt me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif

    <hr class="my-4">

    <section>
        <form action="{{ route('checkout.bayar') }}" method="post">
            @csrf
            <div class="card ekspedisi p-4">
                <h4 class="mb-3 text-center">📦 Alamat Pengiriman</h4>
                <div class="row mb-3">
                    <label for="nama_penerima" class="col-sm-4 col-form-label">Nama Penerima</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_penerima" name="namaPenerima" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat_penerima" class="col-sm-4 col-form-label">Alamat Penerima</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat_penerima" name="alamatPenerima" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tlp" class="col-sm-4 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tlp" name="tlp" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ekspedisi" class="col-sm-4 col-form-label">Ekspedisi</label>
                    <div class="col-sm-8">
                        <select name="ekspedisi" class="form-control" id="ekspedisi" required>
                            <option value="">-- Pilih Ekspedisi --</option>
                            <option value="grab">Grab</option>
                            <option value="angkut">Angkutan Umum</option>
                            <option value="cancel">Cancel Ekspedisi (Makan di Tempat)</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <h5>Total Harga: <span id="grand-total">0.00</span></h5>
                <button type="submit" class="btn btn-success mt-3 px-5 py-2 fw-semibold">
                    <i class="fas fa-check-circle me-2"></i>Pesan Sekarang
                </button>
            </div>
        </form>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // (script logic tetap sama dengan kode asli milikmu)
</script>
@endsection

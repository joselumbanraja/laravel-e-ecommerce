<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- ✅ Pastikan route-nya benar -->
            <form action="{{ route('updateData', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="modal-body">
                    <!-- SKU -->
                    <div class="mb-3 row">
                        <label for="SKU" class="col-sm-5 col-form-label">SKU</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="SKU" name="sku" value="{{ $data->sku }}" readonly>
                        </div>
                    </div>

                    <!-- Nama Product -->
                    <div class="mb-3 row">
                        <label for="nama_product" class="col-sm-5 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_product" name="nama_product" value="{{ $data->nama_product }}" required>
                        </div>
                    </div>

                    <!-- Type Product -->
                    <div class="mb-3 row">
                        <label for="type" class="col-sm-5 col-form-label">Type Produk</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="type" name="type">
                                <option value="">Pilih Type</option>
                                <option value="coffee" {{ $data->type === 'coffee' ? 'selected' : '' }}>Coffee</option>
                                <option value="nonCoffee" {{ $data->type === 'nonCoffee' ? 'selected' : '' }}>Non-Coffee</option>
                                <option value="cemilan" {{ $data->type === 'cemilan' ? 'selected' : '' }}>Cemilan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kategori Product -->
                    <div class="mb-3 row">
                        <label for="kategory" class="col-sm-5 col-form-label">Kategori Produk</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="kategory" name="kategory">
                                <option value="">Pilih Kategori</option>
                                <option value="Makanan" {{ $data->kategory === 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="Minuman" {{ $data->kategory === 'Minuman' ? 'selected' : '' }}>Minuman</option>
                            </select>
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-5 col-form-label">Harga Produk</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" required>
                        </div>
                    </div>

                    <!-- Diskon -->
                    <div class="mb-3 row">
                        <label for="discount" class="col-sm-5 col-form-label">Diskon (%)</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="discount" name="discount" value="{{ $data->discount }}">
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3 row">
                        <label for="quantity" class="col-sm-5 col-form-label">Quantity</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $data->quantity }}" required>
                        </div>
                    </div>

                    <!-- Quantity Out -->
                    <div class="mb-3 row">
                        <label for="quantity_out" class="col-sm-5 col-form-label">Quantity Keluar</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="quantity_out" name="quantity_out" value="{{ $data->quantity_out }}">
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-5 col-form-label">Foto Produk</label>
                        <div class="col-sm-7">
                            <img src="{{ asset('uploads/foto_product/' . $data->foto) }}" class="mb-2 preview" style="width: 100px;">
                            <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg()">
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3 row">
                        <label for="is_active" class="col-sm-5 col-form-label">Status Aktif</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="is_active" name="is_active" required>
                                <option value="1" {{ $data->is_active ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ !$data->is_active ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ✅ Preview Foto -->
<script>
    function previewImg() {
        const fotoIn = document.querySelector('#inputFoto');
        const preview = document.querySelector('.preview');

        if (fotoIn.files && fotoIn.files[0]) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(fotoIn.files[0]);
            oFReader.onload = function(e) {
                preview.src = e.target.result;
            };
        }
    }
</script>
    
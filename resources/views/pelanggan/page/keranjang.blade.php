        @extends('pelanggan.layout.index')

        @section('content')
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Payment List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Nama Penerima</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle text-center">
                                @foreach ($data as $x => $item)
                                    <tr>
                                        <td>{{ ++$x }}</td>
                                        <td>{{ $item->code_transaksi }}</td>
                                        <td>{{ $item->nama_customer }}</td>
                                        <td>{{ $item->total_harga }}</td>
                                        <td>{{ $item->nama_product }}</td>
                                        <td>
                                            @if ($item->status === 'Unpaid')
                                                <span class="badge text-bg-danger">Unpaid</span>
                                            @else
                                                <span class="badge text-bg-success">Paid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status === 'Unpaid')
                                                <a href="{{ route('keranjang.bayar', ['id' => $item->id]) }}" class="btn btn-success">Bayar</a>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" 
                                                        data-id="{{ $item->code_transaksi }}" data-name="{{ $item->nama_customer }}" 
                                                        data-total="{{ $item->total_harga }}" data-status="{{ $item->status }}">
                                                    Rincian
                                                </button>
                                                <form id="cancelForm_{{ $item->id }}" action="{{ route('transaksi.cancel', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger cancel-btn" data-id="{{ $item->id }}">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @else
                                            @foreach ($data as $item)
                                            @php
                                                $details = \App\Models\modelDetailTransaksi::where(['id_transaksi' => $item->code_transaksi, 'status' => 0])->get();
                                                $productNames = $details->map(function($detail) {
                                                    return $detail->product->nama_product;
                                                })->implode(', ');
                                            @endphp
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#orderDetailsModal" 
                                                    data-id="{{ $item->code_transaksi }}" 
                                                    data-name="{{ $item->nama_customer }}" 
                                                    data-total="{{ $item->total_harga }}" 
                                                    data-status="{{ $item->status }}"
                                                    data-products="{{ $productNames }}">
                                                Rincian
                                            </button>
                                            @endforeach
                                        
                                        <button type="button" class="btn btn-secondary" disabled>Cancel</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderDetailsModalLabel">Rincian Transaksi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="customer-name"></p>
                            <p class="total-harga"></p>
                            <p class="status"></p>
                            <p class="products"></p>
                        </div>
                    </div>
                </div>
            </div>
            
            

            <!-- JavaScript -->
            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    const orderDetailsModal = document.getElementById('orderDetailsModal');
                    orderDetailsModal.addEventListener('show.bs.modal', (event) => {
                        const button = event.relatedTarget;
                        const idTransaksi = button.getAttribute('data-id');
                        const namaPenerima = button.getAttribute('data-name');
                        const totalTransaksi = button.getAttribute('data-total');
                        const status = button.getAttribute('data-status');

                        const modalIdTransaksi = orderDetailsModal.querySelector('#modal-id-transaksi');
                        const modalNamaPenerima = orderDetailsModal.querySelector('#modal-nama-penerima');
                        const modalTotalTransaksi = orderDetailsModal.querySelector('#modal-total-transaksi');
                        const modalStatus = orderDetailsModal.querySelector('#modal-status');

                        modalIdTransaksi.textContent = idTransaksi;
                        modalNamaPenerima.textContent = namaPenerima;
                        modalTotalTransaksi.textContent = totalTransaksi;
                        modalStatus.textContent = status === 'Unpaid' ? 'Belum Dibayar' : 'Sudah Dibayar';
                    });

                    // Tambahkan event listener untuk setiap tombol cancel
                    const cancelButtons = document.querySelectorAll('.cancel-btn');
                    cancelButtons.forEach(cancelButton => {
                        cancelButton.addEventListener('click', function() {
                            const id = this.getAttribute('data-id');
                            const form = document.getElementById('cancelForm_' + id);
                            if (confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')) {
                                form.submit();
                            }
                        });
                    });
                });

            document.addEventListener('DOMContentLoaded', function () {
            var orderDetailsModal = document.getElementById('orderDetailsModal');
            orderDetailsModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var code = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');
            var total = button.getAttribute('data-total');
            var status = button.getAttribute('data-status');
            var products = button.getAttribute('data-products');

            var modalTitle = orderDetailsModal.querySelector('.modal-title');
            var modalBody = orderDetailsModal.querySelector('.modal-body');

            modalTitle.textContent = 'Rincian untuk Transaksi ' + code;
            modalBody.querySelector('.customer-name').textContent = 'Nama: ' + name;
            modalBody.querySelector('.total-harga').textContent = 'Total: ' + total;
            modalBody.querySelector('.status').textContent = 'Status: ' + status;
            modalBody.querySelector('.products').textContent = 'Products: ' + products;
        });
    });


            </script>
        @endsection

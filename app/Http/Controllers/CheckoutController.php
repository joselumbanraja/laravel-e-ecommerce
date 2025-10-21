<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\ModelDetailTransaksi;
use App\Models\TblCart;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function prosesCheckouts(Request $request)
    {
        $data = $request->all();
        $selectedProducts = $request->input('selected_products', []);

        if (empty($selectedProducts)) {
            return redirect()->back()->with('error', 'Tidak ada produk yang dipilih untuk di-checkout.');
        }

        $code = Transaksi::count();
        $codeTransaksi = date('Ymd') . ($code + 1);

        foreach ($selectedProducts as $productId) {
            $idBarang = $data['idBarang'][$productId];
            $qty = $data['qty'][$productId];
            $total = $data['total'][$productId];

            // Simpan detail transaksi
            $detailTransaksi = new ModelDetailTransaksi();
            $fieldDetail = [
                'id_transaksi' => $codeTransaksi,
                'id_barang' => $idBarang,
                'qty' => $qty,
                'price' => $total,
            ];
            $detailTransaksi::create($fieldDetail);

            // Update cart
            $fieldCart = [
                'qty' => $qty,
                'price' => $total,
                'status' => 1,
            ];
            TblCart::where('id', $productId)->update($fieldCart);
        }

        Alert::toast('Checkout Berhasil', 'success');
        return redirect()->route('checkout');
    }
}

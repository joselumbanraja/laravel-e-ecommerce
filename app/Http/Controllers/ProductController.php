<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::paginate(3);
        return view('admin.page.product', [
            'name'      => "Product",
            'title'     => 'Admin Product',
            'data'      => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addModal()
    {
        return view('admin/modal/addModal', [
            'title' => 'Tambah Data Product',
            'sku'   => 'BRG' . rand(10000, 99999),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $data = new product;
        $data->sku          = $request->sku;
        $data->nama_product = $request->nama;
        $data->type         = $request->type;
        $data->kategory     = $request->kategori;
        $data->harga        = $request->harga;
        $data->quantity     = $request->quantity;
        $data->discount     = 10 / 100;
        $data->is_active    = 1;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        Alert::toast('Data berhasil disimpan', 'success');
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = product::findOrFail($id);

        return view(
            'admin.modal.editModal',
            [
                'title' => 'Edit data product',
                'data'  => $data,
            ]
        )->render();
    }

    public function update(UpdateproductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Ambil data dari request
        $data = [
            'sku'           => $request->sku,
            'nama_product'  => $request->nama_product,
            'type'          => $request->type,
            'kategory'      => $request->kategory,
            'harga'         => $request->harga,
            'discount'      => $request->discount,
            'quantity'      => $request->quantity,
            'quantity_out'  => $request->quantity_out,
            'is_active'     => $request->is_active,
        ];

        // Jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto && file_exists(public_path('uploads/foto_product/' . $product->foto))) {
                unlink(public_path('uploads/foto_product/' . $product->foto));
            }

            // Upload foto baru
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/foto_product'), $fileName);
            $data['foto'] = $fileName;
        }

        // Update data produk
        $product->update($data);

        // Notifikasi sukses
        Alert::toast('Data produk berhasil diperbarui!', 'success');
        return redirect()->route('product'); // ✅ sesuaikan dengan nama route index kamu
    }


    public function filterProducts(Request $request)
    {
        $categoryId = $request->get('category_id');
        if ($categoryId == 'all') {
            $products = Product::all();
        } else {
            $products = Product::where('category_id', $categoryId)->get();
        }

        $html = view('partials.products', compact('products'))->render();

        return response()->json($html);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}

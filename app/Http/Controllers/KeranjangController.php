<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_produk" => "required|integer|exists:produk",
            "jumlah" => "required|integer",
            'id_user' => 'required|integer|exists:user_login,id_user',
        ]);

        // Ambil data yang dikirim dari sisi klien
        $id_user = $request->input('id_user');
        $id_produk = $request->input('id_produk');
        $jumlah = $request->input('jumlah');

        // Cek apakah produk sudah ada dalam keranjang pengguna
        $cartItem = Keranjang::where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada, tambahkan ke jumlah produk yang ada
            $cartItem->jumlah += $jumlah;
            $cartItem->save();
        } else {
            // Simpan data ke dalam tabel keranjang
            $cartItem = new Keranjang();
            $cartItem->id_user = $id_user;
            $cartItem->id_produk = $id_produk;
            $cartItem->jumlah = $jumlah;

            $cartItem->save();
        }

        return response()->json(['message' => "success"]);
    }

    public function update(Request $request, $idKeranjang)
    {
        $request->validate([
            "nilai" => "nullable|integer",
            "nilaimanual" => "nullable|integer",
        ]);

        $cartItem = Keranjang::where('id', $idKeranjang)
            ->first();

        if ($request->nilai) {
            $nilai = $request->input('nilai');
            $cartItem->jumlah += $nilai;
        }

        if ($request->nilaimanual) {
            $nilaimanual = $request->input('nilaimanual');
            $cartItem->jumlah = $nilaimanual;
        }

        $cartItem->save();

        return response()->json(['message' => 'Item added successfully']);
    }

    /**
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Keranjang $keranjang
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            "id_produk" => "required|integer|exists:keranjang,id_produk",
            'id_user' => 'required|integer|exists:keranjang,id_user',
        ]);

        // Ambil data yang dikirim dari sisi klien
        $id_user = $request->input('id_user');
        $id_produk = $request->input('id_produk');

        // Cek apakah produk sudah ada dalam keranjang pengguna
        $cartItem = Keranjang::where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->first();

        $cartItem->delete();

        return response()->json(['message' => "keranjang deleted successfully"]);
    }
}

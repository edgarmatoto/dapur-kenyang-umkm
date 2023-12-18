<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "id_user" => "required|integer|exists:user_login,id_user",
        ]);

        // get all carts from user
        $keranjang = Keranjang::where("id_user", $request->id_user)
            ->get();

        // insert transaksi table
        $transaksi = Transaksi::create([
            "id_user" => $request->id_user,
            "total" => $this->totalHarga($keranjang),
        ]);

        // create produkMessage for whatsapp message
        $produkMessage = '';

        foreach ($keranjang as $index => $k) {
            //insert transaksi_detail table
            $transaksi_detail = TransaksiDetail::create([
                "id_transaksi" => $transaksi->id,
                "id_produk" => $k->id_produk,
                "jumlah" => $k->jumlah,
            ]);

            $plusIndex = $index + 1;
            $produkMessage .= "{$plusIndex}. {$transaksi_detail->produk->nama_produk} - Jumlah: {$transaksi_detail->jumlah}%0A";
        }

        // drop all user's carts in keranjang table
        Keranjang::where("id_user", $request->id_user)->delete();

        // use whatsapp encode to format produkMessage
        $formattedProdukMessage = str_replace([" ", ":"], ["%20", "%3A"], $produkMessage);

        //create whatsapp message
        $message = "Halo%21%20Saya%20tertarik%20untuk%20memesan%20beberapa%20kue%20dari%20toko%20Anda.%20Berikut%20detail%20pesanan%20saya%3A%0A%0ADetail%20Pesanan%3A%0A$formattedProdukMessage%0AMohon%20informasi%20lebih%20lanjut%20mengenai%20prosedur%20pembayaran%20dan%20ketersediaan%20produk.%0A%0ATerima%20kasih%20banyak%21";

        return redirect()->to("https://wa.me/+6288258192639?text=$message");
    }

    private function totalHarga($keranjang): int
    {
        $totalHarga = 0;

        foreach ($keranjang as $index => $k) {
            $totalHarga += $k->produk["harga_produk"] * $k["jumlah"];
        }

        return $totalHarga;
    }
}

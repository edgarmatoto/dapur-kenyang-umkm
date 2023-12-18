<?php

namespace App\Http\Controllers;

use App\Models\HeaderWebsite;
use App\Models\Keranjang;
use App\Models\Kontak;
use App\Models\Produk;
use App\Models\TentangKami;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class WebController extends Controller
{
    public function index(){
        return view('UserBlade.home', [
            'headerWebsite' => HeaderWebsite::get()
                ->transform(fn($headerWebsite) => [
                    'id' => $headerWebsite->id,
                    'id_produk' => $headerWebsite->id_produk,
                    'deskripsi' => $headerWebsite->deskripsi,
                    'nama_produk' => $headerWebsite->produk->nama_produk,
                    'gambar_produk' => URL::route('image', ['path' => $headerWebsite->produk->gambar_produk]),
                    'slogan' => $headerWebsite->slogan,
                    'id_user' => $headerWebsite->id_user,
                ]),
            'kontak' => Kontak::get()
                ->transform(fn($kontak) => [
                    'id' => $kontak->id,
                    'nomor_telepon' => $kontak->nomor_telepon,
                    'email' => $kontak->email,
                    'alamat' => $kontak->alamat,
                    'alamat_jalan' => $kontak->alamat_jalan,
                    'instagram' => $kontak->instagram,
                    'facebook' => $kontak->facebook,
                    'tiktok' => $kontak->tiktok,
                    'id_user' => $kontak->id_user,
                ]),
            'tentangKami' => TentangKami::get()
                ->transform(fn($tentangKami) => [
                    'id' => $tentangKami->id,
                    'judul' => $tentangKami->judul,
                    'deskripsi' => $tentangKami->deskripsi,
                    'foto' => URL::route('image', ['path' => $tentangKami->foto]),
                    'id_user' => $tentangKami->id_user,
                ]),
            'testimoni' => Testimoni::orderBy('nama')
                ->get()
                ->transform(fn($testimoni) => [
                    'id' => $testimoni->id,
                    'nama' => $testimoni->nama,
                    'skor_bintang' => $testimoni->skor_bintang,
                    'deskripsi' => $testimoni->deskripsi,
                    'foto' => URL::route('image', ['path' => $testimoni->foto]),
                    'id_user' => $testimoni->id_user,
                ]),
            'produk' => Produk::limit(3)
                ->get()
                ->transform(fn($produk) => [
                    'id_produk' => $produk->id_produk,
                    'nama_produk' => $produk->nama_produk,
                    'harga_produk' => $produk->harga_produk,
                    'stok_produk' => $produk->stok_produk,
                    'gambar_produk' => URL::route('image', ['path' => $produk->gambar_produk]),
                    'deskripsi_produk' => $produk->deskripsi_produk,
                ]),
        ]);
    }

    public function produk(){
        return view('UserBlade.produk', [
            'produk' => Produk::orderBy('nama_produk')
                ->get()
                ->transform(fn($produk) => [
                    'id_produk' => $produk->id_produk,
                    'nama_produk' => $produk->nama_produk,
                    'harga_produk' => $produk->harga_produk,
                    'stok_produk' => $produk->stok_produk,
                    'gambar_produk' => URL::route('image', ['path' => $produk->gambar_produk]),
                    'deskripsi_produk' => $produk->deskripsi_produk,
                ]),
            'kontak' => Kontak::get()
                ->transform(fn($kontak) => [
                    'id' => $kontak->id,
                    'nomor_telepon' => $kontak->nomor_telepon,
                    'email' => $kontak->email,
                    'alamat' => $kontak->alamat,
                    'alamat_jalan' => $kontak->alamat_jalan,
                    'instagram' => $kontak->instagram,
                    'facebook' => $kontak->facebook,
                    'tiktok' => $kontak->tiktok,
                    'id_user' => $kontak->id_user,
                ]),
        ]);
    }

    public function detail($idProduk){
        return view('UserBlade.detailproduk', [
            'produk' => Produk::where('id_produk', $idProduk)
                ->get()
                ->transform(fn($produk) => [
                    'id_produk' => $produk->id_produk,
                    'nama_produk' => $produk->nama_produk,
                    'harga_produk' => $produk->harga_produk,
                    'stok_produk' => $produk->stok_produk,
                    'gambar_produk' => URL::route('image', ['path' => $produk->gambar_produk]),
                    'deskripsi_produk' => $produk->deskripsi_produk,
                ]),
            'kontak' => Kontak::get()
                ->transform(fn($kontak) => [
                    'id' => $kontak->id,
                    'nomor_telepon' => $kontak->nomor_telepon,
                    'email' => $kontak->email,
                    'alamat' => $kontak->alamat,
                    'alamat_jalan' => $kontak->alamat_jalan,
                    'instagram' => $kontak->instagram,
                    'facebook' => $kontak->facebook,
                    'tiktok' => $kontak->tiktok,
                    'id_user' => $kontak->id_user,
                ]),
        ]);
    }

    public function order($idUser){
        return view('UserBlade.orderuser', [
            'keranjang' => Keranjang::where('id_user', $idUser)
                ->get()
                ->transform(fn($keranjang) => [
                    'id' => $keranjang->id,
                    'id_produk' => $keranjang->id_produk,
                    'id_user' => $keranjang->id_user,
                    'jumlah' => $keranjang->jumlah,
                    'nama_produk' => $keranjang->produk->nama_produk,
                    'harga_produk' => $keranjang->produk->harga_produk,
                    'gambar_produk' => URL::route('image', ['path' => $keranjang->produk->gambar_produk]),
                ]),
        ]);
    }
}

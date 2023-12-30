<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Inertia\Response;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Produk/Index', [
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Produk/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_produk" => "required|string|unique:produk,nama_produk|max:255",
            "gambar_produk" => "required|image|max:2000|dimensions:ratio=1/1",
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'deskripsi_produk' => 'nullable|string'
        ]);

        $imagePath = $request->file('gambar_produk')->store('produk');

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'gambar_produk' => $imagePath,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
            'deskripsi_produk' => $request->deskripsi_produk
        ]);

        Cache::store("redis")->delete("produk");

        return Redirect::route('produk.index')->with('success', 'Produk created.');
    }

    /**
     * Display the specified resource.
     *
     * @param Produk $product
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param Produk $produk
     * @return Response
     */
    public function edit(Produk $produk)
    {
        return Inertia::render('Produk/Edit', [
            'produk' => [
                'id_produk' => $produk->id_produk,
                'nama_produk' => $produk->nama_produk,
                'gambar_produk' => URL::route('image', ['path' => $produk->gambar_produk]),
                'harga_produk' => $produk->harga_produk,
                'stok_produk' => $produk->stok_produk,
                'deskripsi_produk' => $produk->deskripsi_produk,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Produk $product
     * @return RedirectResponse
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            "nama_produk" => "required|string|max:255",
            "gambar_produk" => "nullable|image|max:2000|dimensions:ratio=1/1",
            'harga_produk' => 'required|integer',
            'stok_produk' => 'required|integer',
            'deskripsi_produk' => 'nullable|string'
        ]);

        $produk->update($request->only('nama_produk', 'harga_produk', 'stok_produk'));

        if ($request->deskripsi_produk) {
            $produk->update([
                'deskripsi_produk' => $request->deskripsi_produk
            ]);
        }

        if ($request->file('gambar_produk')) {
//            Delete old image
            Storage::delete($produk->gambar_produk);

//            Store and update new image
            $imagePath = $request->file('gambar_produk')->store('produk');
            $produk->update([
                'gambar_produk' => $imagePath
            ]);
        }

        Cache::store("redis")->delete("produk");

        return Redirect::back()->with(
            'success', 'Produk updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Produk $product
     * @return RedirectResponse
     */
    public function destroy(Produk $produk)
    {
//        delete local image
        Storage::delete($produk->gambar_produk);

//        delete produk
        $produk->delete();

        Cache::store("redis")->delete("produk");

        return Redirect::route('produk.index')->with('success', 'Produk deleted.');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HeaderWebsite;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Inertia\Response;

class HeaderWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('HeaderWebsite/Index', [
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('HeaderWebsite/Create', [
            'produk' => Produk::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_produk" => "required|int|exists:produk",
            "slogan" => "required|string",
            'id_user' => 'required|integer|exists:users,id',
            'deskripsi' => 'required|string'
        ]);

        HeaderWebsite::create([
            'id_produk' => $request->id_produk,
            'slogan' => $request->slogan,
            'deskripsi' => $request->deskripsi,
            'id_user' => $request->id_user
        ]);

        return Redirect::route('header-website.index')->with('success', 'Header website created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderWebsite  $headerWebsite
     * @return Response
     */
    public function edit(HeaderWebsite $headerWebsite)
    {
        return Inertia::render('HeaderWebsite/Edit', [
            'headerWebsite' => [
                'id' => $headerWebsite->id,
                'id_produk' => $headerWebsite->id_produk,
                'slogan' => $headerWebsite->slogan,
                'deskripsi' => $headerWebsite->deskripsi,
                'id_user' => $headerWebsite->id_user,
            ],
            'produk' => Produk::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderWebsite  $headerWebsite
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, HeaderWebsite $headerWebsite)
    {
        $validated = $request->validate([
            "id_produk" => "required|int|exists:produk",
            "slogan" => "required|string",
            'id_user' => 'required|integer|exists:users,id',
            'deskripsi' => 'required|string'
        ]);

        $headerWebsite->update($validated);

        return Redirect::back()->with(
            'success', 'Header website updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeaderWebsite  $headerWebsite
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(HeaderWebsite $headerWebsite)
    {
//        delete produk
        $headerWebsite->delete();

        return Redirect::route('header-website.index')->with('success', 'Header website deleted.');
    }
}

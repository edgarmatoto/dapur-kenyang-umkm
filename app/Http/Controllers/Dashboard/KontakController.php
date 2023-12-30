<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Kontak/Index', [
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
//        return Inertia::render('Kontak/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'nomor_telepon' => 'required|string|max:20',
//            'instagram' => 'nullable|string|max:255',
//            'facebook' => 'nullable|string|max:255',
//            'tiktok' => 'nullable|string|max:255',
//            'id_user' => 'required|integer',
//        ]);
//
//        Kontak::create([
//            'nomor_telepon' => $request->nomor_telepon,
//            'instagram' => $request->instagram,
//            'facebook' => $request->facebook,
//            'tiktok' => $request->tiktok,
//            'id_user' => $request->id_user,
//        ]);
//
//        return Redirect::route('kontak')->with('success', 'Kontak created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Inertia\Response
     */
    public function edit(Kontak $kontak)
    {
        return Inertia::render('Kontak/Edit', [
            'kontak' => [
                'id' => $kontak->id,
                'nomor_telepon' => $kontak->nomor_telepon,
                'email' => $kontak->email,
                'alamat' => $kontak->alamat,
                'alamat_jalan' => $kontak->alamat_jalan,
                'instagram' => $kontak->instagram,
                'facebook' => $kontak->facebook,
                'tiktok' => $kontak->tiktok,
                'id_user' => $kontak->id_user,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'alamat' => 'nullable|string',
            'alamat_jalan' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'id_user' => 'required|integer',
        ]);

        $kontak->update($request->only('nomor_telepon', 'id_user'));

        if ($request->email) {
            $kontak->update([
                'email' => $request->email
            ]);
        }

        if ($request->alamat) {
            $kontak->update([
                'alamat' => $request->alamat
            ]);
        }

        if ($request->alamat_jalan) {
            $kontak->update([
                'alamat_jalan' => $request->alamat_jalan
            ]);
        }

        if ($request->instagram) {
            $kontak->update([
                'instagram' => $request->instagram
            ]);
        }

        if ($request->facebook) {
            $kontak->update([
                'facebook' => $request->facebook
            ]);
        }

        if ($request->tiktok) {
            $kontak->update([
                'tiktok' => $request->tiktok
            ]);
        }

        Cache::store("redis")->delete("kontak");

        return Redirect::back()->with(
            'success', 'Kontak updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kontak $kontak)
    {
//        $kontak->delete();
//
//        return Redirect::route('kontak')->with('success', 'Kontak deleted.');
    }
}

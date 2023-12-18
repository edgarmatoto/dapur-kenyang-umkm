<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Inertia\Response;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Testimoni/Index', [
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Testimoni/Create');
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
            "nama" => "required|string|max:255",
            "foto" => "required|image|max:2000",
            'skor_bintang' => 'required|integer|min:1|max:5',
            'id_user' => 'required|integer',
            'deskripsi' => 'required|string'
        ]);

        $imagePath = $request->file('foto')->store('testimoni');

        Testimoni::create([
            'nama' => $request->nama,
            'foto' => $imagePath,
            'skor_bintang' => $request->skor_bintang,
            'id_user' => $request->id_user,
            'deskripsi' => $request->deskripsi
        ]);

        return Redirect::route('testimoni.index')->with('success', 'Testimoni created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimoni $testimoni
     * @return Response
     */
    public function edit(Testimoni $testimoni)
    {
        return Inertia::render('Testimoni/Edit', [
            'testimoni' => [
                'id' => $testimoni->id,
                'nama' => $testimoni->nama,
                'foto' => URL::route('image', ['path' => $testimoni->foto]),
                'skor_bintang' => $testimoni->skor_bintang,
                'deskripsi' => $testimoni->deskripsi,
                'id_user' => $testimoni->id_user,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Testimoni $testimoni
     * @return RedirectResponse
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            "nama" => "required|string|max:255",
            "foto" => "nullable|image|max:2000|dimensions:width=600,height=600",
            'skor_bintang' => 'required|integer|min:1|max:5',
            'id_user' => 'required|integer',
            'deskripsi' => 'required|string'
        ]);

        $testimoni->update($request->only('nama', 'skor_bintang', 'id_user', 'deskripsi'));

        if ($request->file('foto')) {
            //            Delete old image
            Storage::delete($testimoni->foto);

//            Store and update new image
            $imagePath = $request->file('foto')->store('testimoni');
            $testimoni->update([
                'foto' => $imagePath
            ]);
        }

        return Redirect::back()->with(
            'success', 'Testimoni updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimoni $testimoni
     * @return RedirectResponse
     */
    public function destroy(Testimoni $testimoni)
    {
        //        delete local image
        Storage::delete($testimoni->foto);

        $testimoni->delete();

        return Redirect::route('testimoni.index')->with('success', 'Testimoni deleted.');
    }
}

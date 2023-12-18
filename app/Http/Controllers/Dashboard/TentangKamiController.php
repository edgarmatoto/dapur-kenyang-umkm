<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Inertia\Response;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('TentangKami/Index', [
            'tentangKami' => TentangKami::get()
                ->transform(fn($tentangKami) => [
                    'id' => $tentangKami->id,
                    'judul' => $tentangKami->judul,
                    'deskripsi' => $tentangKami->deskripsi,
                    'foto' => URL::route('image', ['path' => $tentangKami->foto]),
                    'id_user' => $tentangKami->id_user,
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
        return Inertia::render('TentangKami/Create');
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
            "judul" => "required|string|max:255",
            "foto" => "required|image|max:2000|dimensions:ratio=1/1",
            'id_user' => 'required|integer',
            'deskripsi' => 'required|string'
        ]);

        $imagePath = $request->file('foto')->store('tentang-kami');

        TentangKami::create([
            'judul' => $request->judul,
            'foto' => $imagePath,
            'id_user' => $request->id_user,
            'deskripsi' => $request->deskripsi
        ]);

        return Redirect::route('tentang-kami.index')->with('success', 'Tentang kami created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TentangKami  $tentangKami
     * @return Response
     */
    public function edit(TentangKami $tentangKami)
    {
        return Inertia::render('TentangKami/Edit', [
            'tentangKami' => [
                'id' => $tentangKami->id,
                'judul' => $tentangKami->judul,
                'foto' => URL::route('image', ['path' => $tentangKami->foto]),
                'deskripsi' => $tentangKami->deskripsi,
                'id_user' => $tentangKami->id_user,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TentangKami  $tentangKami
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TentangKami $tentangKami)
    {
        $request->validate([
            "judul" => "required|string|max:255",
            "foto" => "nullable|image|max:2000|dimensions:ratio=1/1",
            'id_user' => 'required|integer',
            'deskripsi' => 'required|string'
        ]);

        $tentangKami->update($request->only('judul', 'id_user', 'deskripsi'));

        if ($request->file('foto')) {
            //            Delete old image
            Storage::delete($tentangKami->foto);

//            Store and update new image
            $imagePath = $request->file('foto')->store('tentang-kami');
            $tentangKami->update([
                'foto' => $imagePath
            ]);
        }

        return Redirect::back()->with(
            'success', 'Tentang kami updated.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TentangKami  $tentangKami
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TentangKami $tentangKami)
    {
        //        delete local image
        Storage::delete($tentangKami->foto);

        $tentangKami->delete();

        return Redirect::route('tentang-kami.index')->with('success', 'Tentang kami deleted.');
    }
}

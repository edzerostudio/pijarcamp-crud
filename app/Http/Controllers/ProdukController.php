<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Requests\ProdukRequest;

class ProdukController extends Controller
{
    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
    }

    /**
     * Menampilkan daftar produk
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('produk.index', ['produk'=> $this->produk->get()]);
    }

    /**
     * Menampilkan detail produk
     *
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\View\View
     */
    public function show(Produk $produk)
    {
        return json_encode($produk->findOrFail($produk->id));
    }

    /**
     * Menambahkan Produk
     *
     * @param  \App\Http\Requests\ProdukRequest  $request
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProdukRequest $request)
    {
        $this->produk->create($request->validated());

        return redirect()->route('produk.index')->withStatus(__('Produk berhasil ditambahkan.'));
    }

    /**
     * Update the book
     *
     * @param  \App\Http\Requests\ProdukRequest  $request
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());

        return back()->withStatus(__('Produk berhasil diperbarui.'));
    }

    /**
     * Delete the book
     *
     * @param  \App\Models\Produk $produk
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return back()->withStatus(__('Produk berhasil dihapus.'));
    }
}

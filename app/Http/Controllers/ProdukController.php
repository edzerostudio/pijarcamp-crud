<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

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
        return view('produk.show', ['produk' => $produk->findOrFail($produk->id)]);
    }

    /**
     * Menambahkan produk
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('produk.create');
    }
}

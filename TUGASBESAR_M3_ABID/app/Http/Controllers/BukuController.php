<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    private $kategoriList = ["Buku Fiksi", "Sastra", "Pelajaran", "Sejarah"];

    public function index()
    {
        $buku = Buku::orderBy('id', 'desc')->get();
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        $kategoriList = $this->kategoriList;
        return view('buku.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer|min:1000|max:2155',
            'kategori' => 'required|in:' . implode(',', $this->kategoriList),
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('status', 'Buku berhasil disimpan ke database.');
    }

    public function edit(Buku $buku)
    {
        $kategoriList = $this->kategoriList;
        return view('buku.edit', compact('buku', 'kategoriList'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'pengarang' => 'required',
            'tahun_terbit' => 'required|integer|min:1000|max:2155',
            'kategori' => 'required|in:' . implode(',', $this->kategoriList),
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('status', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')->with('status', 'Buku berhasil dihapus dari database.');
    }
}
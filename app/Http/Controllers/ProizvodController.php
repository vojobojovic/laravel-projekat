<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;
use Illuminate\Support\Facades\Storage;

class ProizvodController extends Controller
{
    public function home()
    {
        $istaknuti = Proizvod::where('featured', true)->take(6)->get();
        return view('home', compact('istaknuti'));
    }

    public function show($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('proizvod', compact('proizvod'));
    }

    public function index(Request $request)
    {
        $query = Proizvod::query();

        if ($request->filled('tip')) {
            $query->where('tip', $request->tip);
        }
        if ($request->filled('min_cena')) {
            $query->where('cena', '>=', $request->min_cena);
        }
        if ($request->filled('max_cena')) {
            $query->where('cena', '<=', $request->max_cena);
        }

        $proizvodi = $query->get();

        return view('katalog', compact('proizvodi'));
    }

    public function indexAdminEditor()
    {
        $proizvodi = Proizvod::all();
        return view('admin.editor-dashboard', compact('proizvodi'));
    }

    public function create()
    {
        return view('editors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric',
            'tip' => 'required|string',
            'slika' => 'required|image',
            'opis' => 'nullable|string',
        ]);

        if ($request->hasFile('slika')) {
            $imagePath = $request->file('slika')->store('public/proizvodi');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
        }

        Proizvod::create([
            'naziv' => $request->naziv,
            'cena' => $request->cena,
            'tip' => $request->tip,
            'featured' => $request->featured,
            'opis' => $request->opis,
            'slika' => $imagePath,
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Proizvod $proizvod)
    {
        return view('editors.edit', compact('proizvod'));
    }

    public function update(Request $request, Proizvod $proizvod)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric',
            'tip' => 'required|string',
            'slika' => 'nullable|image',
            'opis' => 'nullable|string',
        ]);

        if ($request->hasFile('slika')) {
            $imagePath = $request->file('slika')->store('public/proizvodi');
            $imagePath = str_replace('public/', 'storage/', $imagePath);
            $proizvod->slika = $imagePath;
        }

        $proizvod->update([
            'naziv' => $request->naziv,
            'cena' => $request->cena,
            'tip' => $request->tip,
            'featured' => $request->featured,
            'opis' => $request->opis,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Proizvod $proizvod)
    {
        if ($proizvod->slika) {
            Storage::delete('public/' . str_replace('storage/', '', $proizvod->slika));
        }

        $proizvod->delete();

        return redirect()->route('dashboard');
    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index() {
        $departements = Departement::all();
        return view('pages.departement.index', compact('departements'));
    }
    public function create() {
        return view('pages.departement.create'); }
    public function store(Request $request) {
        $request->validate(['nama_departemen' => 'required|string|max:100|unique:departements,nama_departemen',]);
        Departement::create($request->all());
        return redirect()->route('departements.index')->with('success', 'Departemen berhasil ditambahkan!');
    }
    public function show(Departement $departement) {
        return view('pages.departement.show', compact('departement'));
    }
    public function edit(Departement $departement) {
        return view('pages.departement.update', compact('departement'));
    }
    public function update(Request $request, Departement $departement) {
        $request->validate(['nama_departemen' => 'required|string|max:100|unique:departements,nama_departemen,'.$departement->id,]);
        $departement->update($request->all());
        return redirect()->route('departements.index')->with('success', 'Departemen berhasil diperbarui!');
    }
    public function destroy(Departement $departement) {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Departemen berhasil dihapus!');
    }
}

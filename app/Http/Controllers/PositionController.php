<?php
namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('pages.position.index', compact('positions'));
    }
    public function create()
    {
        return view('pages.position.create');
    }
    public function store(Request $request)
    {
        $request->validate(['nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan', 'gaji_pokok' => 'required|numeric|min:0']);
        Position::create($request->all());
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }
    public function show(Position $position)
    {
        return view('pages.position.show', compact('position'));
    }
    public function edit(Position $position)
    {
        return view('pages.position.update', compact('position'));
    }
    public function update(Request $request, Position $position)
    {
        $request->validate(['nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id, 'gaji_pokok' => 'required|numeric|min:0']);
        $position->update($request->all());
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui!');
    }
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}

<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Departement;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::with(['departement', 'position'])->get();
        return view('pages.employee.index', compact('employees'));
    }

    public function create() {
        $departements = Departement::all();
        $positions = Position::all();
        return view('pages.employee.create', compact('departements', 'positions'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|exists:departements,id',
            'jabatan_id' => 'required|exists:positions,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function show(Employee $employee) {
        $employee->load(['departement', 'position']);
        return view('pages.employee.show', compact('employee'));
    }

    public function edit(Employee $employee) {
        $departements = Departement::all();
        $positions = Position::all();
        return view('pages.employee.edit', compact('employee', 'departements', 'positions'));
    }

    public function update(Request $request, Employee $employee) {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'departemen_id' => 'required|exists:departements,id',
            'jabatan_id' => 'required|exists:positions,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data Karyawan berhasil diperbarui!');
    }

    public function destroy(Employee $employee) {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data Karyawan berhasil dihapus!');
    }
}

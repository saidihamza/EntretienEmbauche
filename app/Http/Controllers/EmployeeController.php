<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:employees',
            'telephone' => 'required|string',
            'poste' => 'required|string',
            'salaire' => 'required|numeric',
            'date_embauche' => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès.');
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'telephone' => 'required|string',
            'poste' => 'required|string',
            'salaire' => 'required|numeric',
            'date_embauche' => 'required|date',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employé supprimé avec succès.');
    }
    public function getAllSalaries()
    {
        $salaries = Employee::pluck('salaire');
        return view('employees.salaries', compact('salaries'));
    }
}
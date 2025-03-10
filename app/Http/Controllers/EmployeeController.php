<?php

// app/Http/Controllers/EmployeeController.php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Liste des employés
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Ajouter un employé
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'salary' => 'nullable|numeric',
            'performance_score' => 'nullable|numeric',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index');
    }

    // Gérer les salaires
    public function salary()
    {
        $employees = Employee::all();
        return view('employees.salary', compact('employees'));
    }

    // Suivi des performances
    public function performance()
    {
        $employees = Employee::all();
        return view('employees.performance', compact('employees'));
    }
}

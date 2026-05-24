<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    public function index()
    {
        if(Auth::user()->cannot('viewAny', Employees::class)) {
            return response([
                'message' => 'Bro... Who are you?'
            ]);
        }

        return response()->json(Employees::all());
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employees::create($request->validated());
        return response()->json($employee, 201);
    }

    public function show(Employees $employee)
    {
        return response()->json($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employees $employee)
    {
        $employee->update($request->validated());
        return response()->json($employee);
    }

    public function destroy(Employees $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Empleado se fue a por churros']);
    }
}

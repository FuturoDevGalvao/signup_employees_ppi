<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('employee.index', [
            'title' => "Lista de funcionários",
            'employees' => Employee::all(['id', 'name', 'age', 'email', 'wage']),
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
            "employeeDestroied" => $request->session()->get('employee')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view("employee.create", [
            'title' => 'Criar novo funcionário',
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employeeData = $request->only(['name', 'age', 'email', 'password', 'wage']);

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            Employee::create($employeeData);
            $sessionData['success'] = $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        } catch (\Throwable $th) {
            dd($th);
            $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show', [
            'title' => 'Exibir funcionário',
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        return view("employee.edit", [
            'title' => 'Atualizar informações do funcionário',
            'employee' => Employee::find($id),
            'updatedEmployee' => $request->session()->get('updatedEmployee'),
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newEmployeeData = $request->only(['name', 'age', 'wage', 'email', 'password']);

        $sessionData = ['success' => false, 'showModal' => false, 'updatedEmployee' => null];

        try {
            $employee = Employee::findOrFail($id);
            $employee->update($newEmployeeData);
            $sessionData['updatedEmployee'] = $employee;
            $sessionData['success'] = $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        } catch (\Throwable $th) {
            dd($th);
            $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sessionData = ['success' => false, 'showModal' => false];

        try {
            $employee = Employee::findOrFail($id);
            $employee->images->each(fn($image) => Image::deleteFileImageOnDeleteRegister($image->path));
            $sessionData['success'] = $sessionData['showModal'] = true;
            $sessionData['employee'] = $employee;
            $employee->delete();
            return redirect()->back()->with($sessionData);
        } catch (\Throwable $th) {
            dd($th);
            $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        }
    }
}

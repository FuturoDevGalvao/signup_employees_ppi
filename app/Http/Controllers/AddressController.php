<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('address.index', [
            'title' => 'Lista de enderços',
            'addresses' => Address::all(['id', 'road', 'number', 'cep', 'state', 'complement', 'employee_id']),
            'employeeOwnerDeletedAddress' => $request->session()->get('employeeOwnerDeletedAddress'),
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('address.create', [
            'title' => 'Criar novo endereço',
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
            'employee' => Employee::find($request->query('employee'))
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
        $employeeData = $request->only(['road', 'number', 'cep', 'state', 'complement', 'employee_id']);

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            Address::create($employeeData);
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
        return view('address.show', [
            'title' => 'Visualizar Endereço',
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
        $address = Address::find($id);

        return view('address.edit', [
            'title' => 'Editar endereço',
            'address' => $address,
            'employee' => $address->employee,
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
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
        $newAddressData = $request->only(['road', 'number', 'cep', 'state', 'complement', 'employee_id']);

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            $address = Address::findOrFail($id);
            $address->update($newAddressData);
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
            $address = Address::findOrFail($id);
            $sessionData['success'] = $sessionData['showModal'] = true;
            $sessionData['employeeOwnerDeletedAddress'] = $address->employee;
            $address->delete();
            return redirect()->back()->with($sessionData);
        } catch (\Throwable $th) {
            dd($th);
            $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        }
    }
}

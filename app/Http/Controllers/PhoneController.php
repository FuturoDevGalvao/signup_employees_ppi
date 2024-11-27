<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('phone.index', [
            'title' => 'Lista de telefones',
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
        return view('phone.create', [
            'title' => 'Novo telefone',
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
        dd($request);

        $phoneData = $request->only(['number', 'employee_id']);

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            Phone::create($phoneData);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image.index', [
            'title' => 'Fotos de perfil',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('image.create', [
            'title' => 'Inserir nova foto de perfil',
            'sucess' => $request->session()->get('sucess'),
            'showModal' => $request->session()->get('showModal')
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
        $employeeData = ['employee_id' => $request->only('employee_id'), 'image' => $request->file('image')];

        dd($employeeData);

        $sessionData = ['sucess' => false, 'showModal' => false];

        try {
            Image::create($employeeData);
            $sessionData['sucess'] = $sessionData['showModal'] = true;
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

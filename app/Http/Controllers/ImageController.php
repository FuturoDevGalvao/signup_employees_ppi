<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('image.index', [
            'title' => 'Fotos de perfil',
            'success' => $request->session()->get('success'),
            'showModal' => $request->session()->get('showModal'),
            'images' => Image::all(['id', 'path', 'employee_id']),
            'employeeOwnerDeletedImage' => $request->session()->get('employeeOwnerDeletedImage')
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
        $imageData = $request->only('employee_id');

        if ($request->hasFile('image')) {
            $imageData['path'] = Image::saveImage($request->file('image'));
        }

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            Image::create($imageData);
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
        return view('image.show', [
            'title' => 'Visualizar Imagens',
            'employee' => Employee::find($id),
            'success' => session()->get('success'),
            'showModal' => session()->get('showModal'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);

        return view('image.edit', [
            'title' => 'Editar Imagem',
            'image' => $image,
            'success' => session()->get('success'),
            'showModal' => session()->get('showModal'),
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
        $imageData = $request->only('employee_id');

        if ($request->hasFile('image')) {
            $imageData['path'] = Image::saveImage($request->file('image'));
        }

        $sessionData = ['success' => false, 'showModal' => false];

        try {
            $image = Image::findOrFail($id);
            $image->update($imageData);
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
            $image = Image::findOrFail($id);
            Image::deleteFileOnDeleteRegister($image->path);
            $sessionData['success'] = $sessionData['showModal'] = true;
            $sessionData['employeeOwnerDeletedImage'] = $image->employee;
            $image->delete();
            return redirect()->back()->with($sessionData);
        } catch (\Throwable $th) {
            dd($th);
            $sessionData['showModal'] = true;
            return redirect()->back()->with($sessionData);
        }
    }
}

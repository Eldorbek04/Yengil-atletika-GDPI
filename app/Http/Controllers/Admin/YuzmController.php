<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\yuzmmodel;
use Illuminate\Http\Request;

class YuzmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $yuzm = yuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.yuzm.index", compact('yuzm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.yuzm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'family_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'middle_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'orientation' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'group' => 'required|string|max:50',
            'result' => 'required|numeric|min:0.01',
        ]);

        // Xabar yuboriladigan ma'lumotlar
        $requestData = $validatedData;
        // Ma'lumotlarni saqlash
        yuzmmodel::create($validatedData);
        return redirect()->route('admin.yuzm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $yuzm = yuzmmodel::find($id);
        return view('admin.yuzm.edit', compact('yuzm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'family_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'middle_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'orientation' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'group' => 'required|string|max:50',
            'result' => 'required|numeric|min:0.01',
        ]);

        $yuzm = yuzmmodel::find($id);
        $yuzm->name = $request->name;
        $yuzm->family_name = $request->family_name;
        $yuzm->middle_name = $request->middle_name;
        $yuzm->orientation = $request->orientation;
        $yuzm->group = $request->group;
        $yuzm->result = $request->result;
        $yuzm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.yuzm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = yuzmmodel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ikkiyuzmmodel;
use Illuminate\Http\Request;

class IkkiyuzmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $ikkiyuzm = Ikkiyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.ikkiyuzm.index", compact('ikkiyuzm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ikkiyuzm.create');
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
        Ikkiyuzmmodel::create($validatedData);
        return redirect()->route('admin.ikkiyuzm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $ikkiyuzm = Ikkiyuzmmodel::find($id);
        return view('admin.ikkiyuzm.edit', compact('ikkiyuzm'));
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

        $ikkiyuzm = Ikkiyuzmmodel::find($id);
        $ikkiyuzm->name = $request->name;
        $ikkiyuzm->family_name = $request->family_name;
        $ikkiyuzm->middle_name = $request->middle_name;
        $ikkiyuzm->orientation = $request->orientation;
        $ikkiyuzm->group = $request->group;
        $ikkiyuzm->result = $request->result;
        $ikkiyuzm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.ikkiyuzm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Ikkiyuzmmodel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

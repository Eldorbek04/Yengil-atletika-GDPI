<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\skkizyuzmmodel;
use Illuminate\Http\Request;

class SakkizyuzmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $sakkizyuzm = skkizyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.sakkizyuzm.index", compact('sakkizyuzm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sakkizyuzm.create');
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
            'gender'        => ['required', 'string', 'in:male,female'], // Jinsi majburiy
            'group' => 'required|string|max:50',
            'result' => [
                'required',
                'string',
                'regex:/^[0-9.,]+$/',
            ],
        ]);

        // Xabar yuboriladigan ma'lumotlar
        $requestData = $validatedData;
        // Ma'lumotlarni saqlash
        skkizyuzmmodel::create($validatedData);
        return redirect()->route('admin.sakkizyuzm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $sakkizyuzm = skkizyuzmmodel::find($id);
        return view('admin.sakkizyuzm.edit', compact('sakkizyuzm'));
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
            'gender'        => ['required', 'string', 'in:male,female'], // Jinsi majburiy
            'group' => 'required|string|max:50',
            'result' => [
                'required',
                'string',
                'regex:/^[0-9.,]+$/',
            ],
        ]);

        $sakkizyuzm = skkizyuzmmodel::find($id);
        $sakkizyuzm->name = $request->name;
        $sakkizyuzm->family_name = $request->family_name;
        $sakkizyuzm->middle_name = $request->middle_name;
        $sakkizyuzm->orientation = $request->orientation;
        $sakkizyuzm->gender = $request->gender; // gender maydonini yangilash
        $sakkizyuzm->group = $request->group;
        $sakkizyuzm->result = $request->result;
        $sakkizyuzm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.sakkizyuzm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = skkizyuzmmodel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

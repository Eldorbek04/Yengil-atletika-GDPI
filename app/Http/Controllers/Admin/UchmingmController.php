<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UchmingmModel;
use Illuminate\Http\Request;

class UchmingmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $uchmingm = UchmingmModel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.uchmingm.index", compact('uchmingm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.uchmingm.create');
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
        UchmingmModel::create($validatedData);
        return redirect()->route('admin.uchmingm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $uchmingm = UchmingmModel::find($id);
        return view('admin.uchmingm.edit', compact('uchmingm'));
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

        $uchmingm = UchmingmModel::find($id);
        $uchmingm->name = $request->name;
        $uchmingm->family_name = $request->family_name;
        $uchmingm->middle_name = $request->middle_name;
        $uchmingm->orientation = $request->orientation;
        $uchmingm->group = $request->group;
        $uchmingm->result = $request->result;
        $uchmingm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.uchmingm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = UchmingmModel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

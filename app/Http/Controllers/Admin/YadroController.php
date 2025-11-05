<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YadroModel;
use Illuminate\Http\Request;

class YadroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $yadro = YadroModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);

        return view("admin.yadro.index", compact('yadro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.yadro.create');
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
        YadroModel::create($validatedData);
        return redirect()->route('admin.yadro.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $yadro = YadroModel::find($id);
        return view('admin.yadro.edit', compact('yadro'));
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

        $yadro = YadroModel::find($id);
        $yadro->name = $request->name;
        $yadro->family_name = $request->family_name;
        $yadro->middle_name = $request->middle_name;
        $yadro->orientation = $request->orientation;
        $yadro->group = $request->group;
        $yadro->result = $request->result;
        $yadro->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.yadro.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = YadroModel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

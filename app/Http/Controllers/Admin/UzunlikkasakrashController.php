<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YzunlikkasakrashModel;
use Illuminate\Http\Request;

class UzunlikkasakrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $uzunlikkasakrash = YzunlikkasakrashModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);

        return view("admin.uzunlikkasakrash.index", compact('uzunlikkasakrash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.uzunlikkasakrash.create');
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
        YzunlikkasakrashModel::create($validatedData);
        return redirect()->route('admin.uzunlikkasakrash.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $uzunlikkasakrash = YzunlikkasakrashModel::find($id);
        return view('admin.uzunlikkasakrash.edit', compact('uzunlikkasakrash'));
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

        $uzunlikkasakrash = YzunlikkasakrashModel::find($id);
        $uzunlikkasakrash->name = $request->name;
        $uzunlikkasakrash->family_name = $request->family_name;
        $uzunlikkasakrash->middle_name = $request->middle_name;
        $uzunlikkasakrash->orientation = $request->orientation;
        $uzunlikkasakrash->group = $request->group;
        $uzunlikkasakrash->result = $request->result;
        $uzunlikkasakrash->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.uzunlikkasakrash.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = YzunlikkasakrashModel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

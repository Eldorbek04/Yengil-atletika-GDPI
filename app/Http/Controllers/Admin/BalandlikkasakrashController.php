<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BalandlikkasakrashModel;
use Illuminate\Http\Request;

class BalandlikkasakrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $balandlikkasakrash = BalandlikkasakrashModel::query()
        ->orderBy('result', 'desc') // Eng kattasi (eng yaxshi natija) tepada
        ->orderBy('id', 'asc') // Natijalar bir xil bo'lsa, ID bo'yicha saralash
        ->paginate($perPage);
        return view("admin.balandlikkasakrash.index", compact('balandlikkasakrash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.balandlikkasakrash.create');
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

        $requestData = $validatedData;
        BalandlikkasakrashModel::create($validatedData);
        return redirect()->route('admin.balandlikkasakrash.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $balandlikkasakrash = BalandlikkasakrashModel::find($id);
        return view('admin.balandlikkasakrash.edit', compact('balandlikkasakrash'));
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

        $balandlikkasakrash = BalandlikkasakrashModel::find($id);
        $balandlikkasakrash->name = $request->name;
        $balandlikkasakrash->family_name = $request->family_name;
        $balandlikkasakrash->middle_name = $request->middle_name;
        $balandlikkasakrash->orientation = $request->orientation;
        $balandlikkasakrash->group = $request->group;
        $balandlikkasakrash->result = $request->result;
        $balandlikkasakrash->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.balandlikkasakrash.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = BalandlikkasakrashModel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

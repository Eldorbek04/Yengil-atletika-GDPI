<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Birmingbeshyuzmmodel;
use Illuminate\Http\Request;

class BirmingbeshyuzmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $birmingbeshyuzm = Birmingbeshyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.birmingbeshyuzm.index", compact('birmingbeshyuzm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.birmingbeshyuzm.create');
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
        Birmingbeshyuzmmodel::create($validatedData);
        return redirect()->route('admin.birmingbeshyuzm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $birmingbeshyuzm = Birmingbeshyuzmmodel::find($id);
        return view('admin.birmingbeshyuzm.edit', compact('birmingbeshyuzm'));
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

        $birmingbeshyuzm = Birmingbeshyuzmmodel::find($id);
        $birmingbeshyuzm->name = $request->name;
        $birmingbeshyuzm->family_name = $request->family_name;
        $birmingbeshyuzm->middle_name = $request->middle_name;
        $birmingbeshyuzm->orientation = $request->orientation;
        $birmingbeshyuzm->gender = $request->gender; // gender maydonini yangilash
        $birmingbeshyuzm->group = $request->group;
        $birmingbeshyuzm->result = $request->result;
        $birmingbeshyuzm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.birmingbeshyuzm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Birmingbeshyuzmmodel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

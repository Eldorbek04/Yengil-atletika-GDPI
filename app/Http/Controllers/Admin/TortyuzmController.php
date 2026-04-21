<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tortyuzmmodel;
use Illuminate\Http\Request;

class TortyuzmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $tortyuzm = Tortyuzmmodel::query()
            ->orderBy('result', 'asc')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.tortyuzm.index", compact('tortyuzm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tortyuzm.create');
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
            'gender' => ['required', 'string', 'in:male,female'], // Jinsi majburiy
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
        Tortyuzmmodel::create($validatedData);
        return redirect()->route('admin.tortyuzm.index')->with('success', "Natija muvaffaqiyatli saqlandi.");
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
        $tortyuzm = Tortyuzmmodel::find($id);
        return view('admin.tortyuzm.edit', compact('tortyuzm'));
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
            'gender' => ['required', 'string', 'in:male,female'], // Jinsi majburiy
            'group' => 'required|string|max:50',
            'result' => [
                'required',
                'regex:/^[0-9.,]+$/', // Faqat raqam va nuqtalarni ruxsat beradi
                'min:0.01'
            ],
        ]);

        $tortyuzm = Tortyuzmmodel::find($id);
        $tortyuzm->name = $request->name;
        $tortyuzm->family_name = $request->family_name;
        $tortyuzm->middle_name = $request->middle_name;
        $tortyuzm->orientation = $request->orientation;
        $tortyuzm->gender = $request->gender; // gender maydonini yangilash
        $tortyuzm->group = $request->group;
        $tortyuzm->result = $request->result;
        $tortyuzm->save();

        // teammembers::create($requestData);
        return redirect()->route('admin.tortyuzm.index')->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Tortyuzmmodel::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Natija muvaffaqiyatli O\'chirildi.');
    }
}

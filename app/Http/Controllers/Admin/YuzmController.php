<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\yuzmmodel;
use Illuminate\Http\Request;

class YuzmController extends Controller
{
    /**
     * Natijalar ro'yxatini ko'rsatish (eng yaxshi natija bo'yicha saralangan).
     */
    public function index()
    {
        $perPage = 10;
        $yuzm = yuzmmodel::query()
            ->orderBy('result', 'asc') // Eng kichik vaqt - eng yaxshi natija
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return view("admin.yuzm.index", compact('yuzm'));
    }

    /**
     * Yangi natija qo'shish sahifasi.
     */
    public function create()
    {
        return view('admin.yuzm.create');
    }

    /**
     * Yangi natijani saqlash.
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

        yuzmmodel::create($validatedData);

        return redirect()
            ->route('admin.yuzm.index')
            ->with('success', "Natija muvaffaqiyatli saqlandi.");
    }

    /**
     * Natijani ko'rish (agar kerak bo'lsa).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Tahrirlash sahifasiga o'tish.
     */
    public function edit(string $id)
    {
        $yuzm = yuzmmodel::findOrFail($id);
        return view('admin.yuzm.edit', compact('yuzm'));
    }

    /**
     * Mavjud natijani yangilash.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'family_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'middle_name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'orientation' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\']+$/u'],
            'gender' => ['required', 'string', 'in:male,female'], // Update'da ham gender qo'shildi
            'group' => 'required|string|max:50',
            'result' => [
                'required',
                'string',
                'regex:/^[0-9.,]+$/',
            ],
        ]);

        $yuzm = yuzmmodel::findOrFail($id);
        $yuzm->update($validatedData); // Barcha ma'lumotlarni bittada yangilash

        return redirect()
            ->route('admin.yuzm.index')
            ->with('success', "Natija muvaffaqiyatli o'zgartirildi.");
    }

    /**
     * Natijani o'chirish.
     */
    public function destroy(string $id)
    {
        $yuzm = yuzmmodel::findOrFail($id);
        $yuzm->delete();

        return redirect()->back()->with('success', 'Natija muvaffaqiyatli o\'chirildi.');
    }
}
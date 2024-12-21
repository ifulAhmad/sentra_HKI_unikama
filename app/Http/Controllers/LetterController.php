<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::all();
        return view('admins.letter.index', compact('letters'));
    }
    public function create()
    {
        if (Letter::where('type', 'Template Pernyataan')->exists() && Letter::where('type', 'Template SPH')->exists()) {
            return redirect()->route('admin.letter.index')->with('error', 'Template surat pernyataan dan SPH sudah ada');
        }
        return view('admins.letter.create');
    }
    public function store(Request $request)
    {
        $validatedLetter = $request->validate([
            'file_letter' => 'required|file|mimes:pdf,docx|max:2048',
            'type' => 'nullable'
        ]);
        if (!Letter::where('type', 'Template Pernyataan')->exists()) {
            if ($request->hasFile('file_letter')) {
                $validatedLetter['file_letter'] = $request->file('file_letter')->store('letter-template');
            }
            $validatedLetter['type'] = 'Template Pernyataan';
            Letter::create($validatedLetter);
            return redirect()->route('admin.letter.index')->with('success', 'Template surat pernyataan berhasil ditambahkan');
        }
        if (!Letter::where('type', 'Template SPH')->exists()) {
            if ($request->hasFile('file_letter')) {
                $validatedLetter['file_letter'] = $request->file('file_letter')->store('letter-template');
            }
            $validatedLetter['type'] = 'Template SPH';
            Letter::create($validatedLetter);
            return redirect()->route('admin.letter.index')->with('success', 'Template SPH berhasil ditambahkan');
        }
        return redirect()->route('admin.letter.index')->with('error', 'Template surat pernyataan dan SPH sudah ada');
    }

    public function edit(Letter $letter)
    {
        return view('admins.letter.edit', compact('letter'));
    }

    public function update(Request $request, Letter $letter)
    {
        $validatedLetter = $request->validate([
            'file_letter' => 'required|file|mimes:pdf,docx|max:2048',
            'type' => 'nullable'
        ]);
        if ($request->hasFile('file_letter')) {
            if ($letter->file_letter) {
                Storage::delete($letter->file_letter);
            }
            $validatedLetter['file_letter'] = $request->file('file_letter')->store('letter-template');
        }
        $letter->update($validatedLetter);
        return redirect()->route('admin.letter.index')->with('success', 'Template surat berhasil diperbarui');
    }
}

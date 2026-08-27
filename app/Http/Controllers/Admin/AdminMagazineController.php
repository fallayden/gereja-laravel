<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMagazineController extends Controller
{
    public function index()
    {
        $magazines = Magazine::latest('publish_date')->paginate(10);
        return view('admin.pedang-roh.index', compact('magazines'));
    }

    public function create()
    {
        return view('admin.pedang-roh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'edition_number' => 'required',
            'publish_date' => 'required|date',
            'cover_image' => 'nullable|image|max:2048',
            'pdf_file' => 'required|mimes:pdf|max:20480',
        ]);

        $coverPath = $request->hasFile('cover_image') 
            ? $request->file('cover_image')->store('magazine-covers', 'public') 
            : null;

        $pdfPath = $request->file('pdf_file')->store('magazines', 'public');

        Magazine::create([
            'title' => $request->title,
            'edition_number' => $request->edition_number,
            'publish_date' => $request->publish_date,
            'cover_image' => $coverPath,
            'pdf_file' => $pdfPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.pedang-roh.index')->with('success', 'Majalah berhasil diunggah!');
    }

    public function destroy(Magazine $pedang_roh)
    {
        if ($pedang_roh->cover_image) {
            Storage::disk('public')->delete($pedang_roh->cover_image);
        }
        if ($pedang_roh->pdf_file) {
            Storage::disk('public')->delete($pedang_roh->pdf_file);
        }
        $pedang_roh->delete();

        return redirect()->route('admin.pedang-roh.index')->with('success', 'Majalah berhasil dihapus.');
    }
}
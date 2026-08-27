<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminWartaController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.warta.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.warta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
            'pdf_attachment' => 'nullable|mimes:pdf|max:10240',
        ]);

        $thumbnailPath = $request->hasFile('thumbnail') 
            ? $request->file('thumbnail')->store('thumbnails', 'public') 
            : null;

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'excerpt' => Str::limit(strip_tags($request->body), 150),
            'body' => $request->body,
            'thumbnail' => $thumbnailPath,
            'published_at' => now(),
            'is_published' => true,
        ]);

        if ($request->hasFile('pdf_attachment')) {
            $pdf = $request->file('pdf_attachment');
            $pdfPath = $pdf->store('warta-attachments', 'public');
            ArticleAttachment::create([
                'article_id' => $article->id,
                'file_name' => $pdf->getClientOriginalName(),
                'file_path' => $pdfPath,
                'file_size' => $pdf->getSize(),
            ]);
        }

        return redirect()->route('admin.warta.index')->with('success', 'Warta jemaat berhasil ditambahkan!');
    }

    public function destroy(Article $warta)
    {
        if ($warta->thumbnail) {
            Storage::disk('public')->delete($warta->thumbnail);
        }
        foreach ($warta->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->file_path);
        }
        $warta->delete();

        return redirect()->route('admin.warta.index')->with('success', 'Warta berhasil dihapus.');
    }
}
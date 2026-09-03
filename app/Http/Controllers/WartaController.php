<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleAttachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class WartaController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->select(['id', 'title', 'slug', 'excerpt', 'thumbnail', 'published_at', 'is_published'])
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(6);

        $archives = Article::query()
            ->select(['id', 'title', 'slug', 'published_at', 'is_published'])
            ->where('is_published', true)
            ->has('attachments')
            ->with(['attachments:id,article_id,file_name,file_path,file_size'])
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('warta.index', compact('articles', 'archives'));
    }

    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->with('attachments')
            ->firstOrFail();

        return view('warta.show', compact('article'));
    }

    public function viewAttachment(ArticleAttachment $attachment)
    {
        if (! Storage::disk('public')->exists($attachment->file_path)) {
            abort(404, 'File lampiran tidak ditemukan.');
        }

        return Storage::disk('public')->response(
            $attachment->file_path,
            $attachment->file_name,
            [
                'Content-Type' => 'application/pdf',
                'Cache-Control' => 'public, max-age=86400',
            ]
        );
    }

    public function downloadAttachment(ArticleAttachment $attachment)
    {
        if (! Storage::disk('public')->exists($attachment->file_path)) {
            abort(404, 'File lampiran tidak ditemukan.');
        }

        return Storage::disk('public')->download(
            $attachment->file_path,
            $attachment->file_name
        );
    }
}

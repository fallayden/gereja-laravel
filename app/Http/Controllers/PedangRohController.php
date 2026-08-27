<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PedangRohController extends Controller
{
    public function index(Request $request): View
    {
        $query = Magazine::latest('publish_date');

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('edition_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('year')) {
            $query->whereYear('publish_date', $request->year);
        }

        $magazines = $query->paginate(8)->withQueryString();

        $years = Magazine::query()
            ->selectRaw('YEAR(publish_date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        return view('pedang-roh.index', compact('magazines', 'years'));
    }

    public function view(Magazine $magazine)
    {
        if (!Storage::disk('public')->exists($magazine->pdf_file)) {
            abort(404, 'File majalah tidak ditemukan.');
        }

        return Storage::disk('public')->response(
            $magazine->pdf_file,
            $magazine->title . '.pdf',
            [
                'Content-Type' => 'application/pdf',
                'Cache-Control' => 'public, max-age=86400',
            ]
        );
    }

    public function download(Magazine $magazine)
    {
        if (!Storage::disk('public')->exists($magazine->pdf_file)) {
            abort(404, 'File majalah tidak ditemukan.');
        }

        return Storage::disk('public')->download(
            $magazine->pdf_file,
            $magazine->title . '.pdf'
        );
    }
}

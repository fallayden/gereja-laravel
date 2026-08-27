<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $schedules = [
            ['name' => 'Ibadah Raya 1', 'day' => 'Minggu', 'time' => '07:30 - 09:30 WIB', 'location' => 'Gedung Utama'],
            ['name' => 'Ibadah Raya 2', 'day' => 'Minggu', 'time' => '10:00 - 12:00 WIB', 'location' => 'Gedung Utama'],
            ['name' => 'Sekolah Minggu', 'day' => 'Minggu', 'time' => '10:00 - 11:30 WIB', 'location' => 'Ruang Anak'],
            ['name' => 'Pendalaman Alkitab', 'day' => 'Rabu', 'time' => '19:00 - 20:30 WIB', 'location' => 'Online via Zoom'],
        ];

        return view('home', compact('schedules'));
    }

    public function about(): View
    {
        return view('about');
    }
}
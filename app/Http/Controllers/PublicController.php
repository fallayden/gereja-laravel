<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $schedules = [
            ['name' => 'Kebaktian Umum', 'day' => 'Minggu', 'time' => '09:30 - 11:00 WIB', 'location' => 'Gedung Utama GBIA GRAMMATA'],
            ['name' => 'Sekolah Minggu', 'day' => 'Minggu', 'time' => '09:30 - 10:30 WIB', 'location' => 'Ruang Anak Sekolah Minggu'],
            ['name' => 'Kebaktian Doa', 'day' => 'Jumat', 'time' => '17:30 - 18:30 WIB', 'location' => 'Ruang Anak'],
            ['name' => 'Kebaktian Pemuda', 'day' => 'Sabtu', 'time' => '18:30 - 20:30 WIB', 'location' => 'Gedung Utama GBIA GRAMMATA'],
        ];

        return view('home', compact('schedules'));
    }

    public function about(): View
    {
        return view('about');
    }
}
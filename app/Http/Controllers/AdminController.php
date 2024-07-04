<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; // Schedule modelini dahil edin

class AdminController extends Controller
{
    public function showSchedule()
    {
        // Takvimi veritabanından çekin
        $schedule = Schedule::first(); // Örneğin, ilk kaydı çekiyoruz
        return view('admin.schedule', compact('schedule'));
    }

    public function updateSchedule(Request $request)
    {
        // Validasyon ekleyin
        $request->validate([
            'monday_time' => 'required|string',
            'monday_link' => 'nullable|url',
            'tuesday_time' => 'required|string',
            'tuesday_link' => 'nullable|url',
            // Diğer günler için de benzer validasyonlar ekleyin
        ]);

        // Takvimi güncelleyin
        $schedule = Schedule::first();
        $schedule->update([
            'monday_time' => $request->monday_time,
            'monday_link' => $request->monday_link,
            'tuesday_time' => $request->tuesday_time,
            'tuesday_link' => $request->tuesday_link,
            // Diğer günler için de benzer güncellemeler yapın
        ]);

        return redirect()->route('admin.schedule')->with('success', 'Takvim güncellendi.');
    }
}

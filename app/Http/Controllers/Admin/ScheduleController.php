<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        Schedule::create($validated);

        return redirect()->route('admin.schedule.index');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request)
    {
        $times = $request->input('time');
        $links = $request->input('link');

        foreach ($request->input('schedule') as $index => $scheduleData) {
            $schedule = Schedule::find($scheduleData['id']);
            $schedule->update([
                'time' => $times[$index],
                'link' => $links[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Eğitim takvimi başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedule.index');
    }
}



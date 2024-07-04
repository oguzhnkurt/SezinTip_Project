<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    public function index()
    {
        $examResults = ExamResult::with(['employee', 'exam'])->get();
        return view('examResults.index', compact('examResults'));
    }

    public function create()
    {
        return view('examResults.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'exam_id' => 'required|exists:exams,id',
            'score' => 'required|integer',
        ]);

        ExamResult::create($request->all());

        return redirect()->route('examResults.index')->with('success', 'Exam result created successfully.');
    }

    public function show(ExamResult $examResult)
    {
        return view('examResults.show', compact('examResult'));
    }

    public function edit(ExamResult $examResult)
    {
        return view('examResults.edit', compact('examResult'));
    }

    public function update(Request $request, ExamResult $examResult)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'exam_id' => 'required|exists:exams,id',
            'score' => 'required|integer',
        ]);

        $examResult->update($request->all());

        return redirect()->route('examResults.index')->with('success', 'Exam result updated successfully.');
    }

    public function destroy(ExamResult $examResult)
    {
        $examResult->delete();

        return redirect()->route('examResults.index')->with('success', 'Exam result deleted successfully.');
    }
}
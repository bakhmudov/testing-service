<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::all();
        return view('teacher.tests.index', compact('tests'));
    }

    public function create()
    {
        $topics = Topic::all(); // Загрузите все темы
        return view('teacher.tests.create', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_time' => 'required|integer',
            'topic_id' => 'required|exists:topics,id',
        ]);

        Test::create($request->all());

        return redirect()->route('teacher.tests.index')
            ->with('success', 'Test created successfully.');
    }

    public function edit(Test $test)
    {
        $topics = Topic::all(); // Загрузите все темы
        return view('teacher.tests.edit', compact('test', 'topics'));
    }

    public function update(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'total_time' => 'required|integer',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $test->update($request->all());

        return redirect()->route('teacher.tests.index')
            ->with('success', 'Test updated successfully.');
    }

    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->route('teacher.tests.index')
            ->with('success', 'Test deleted successfully.');
    }
}

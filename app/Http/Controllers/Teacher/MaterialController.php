<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Topic;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('teacher.materials.index', compact('materials'));
    }

    public function create()
    {
        return view('teacher.materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'topic_id' => 'required|exists:topics,id',
        ]);

        Material::create($request->all());

        return redirect()->route('teacher.materials.index')
            ->with('success', 'Material created successfully.');
    }

    public function edit(Material $material)
    {
        $topics = Topic::all();
        return view('teacher.materials.edit', compact('material', 'topics'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $material->update($request->all());

        return redirect()->route('teacher.materials.index')
            ->with('success', 'Material updated successfully.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('teacher.materials.index')
            ->with('success', 'Material deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/disciplines",
     *     operationId="getDisciplinesList",
     *     tags={"Disciplines"},
     *     summary="Get list of disciplines",
     *     description="Returns list of disciplines",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Discipline"))
     *     ),
     * )
     */
    public function index()
    {
        return Discipline::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $discipline = Discipline::create($request->all());
        return response()->json($discipline, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Discipline::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $discipline = Discipline::findOrFail($id);
        $discipline->update($request->all());
        return response()->json($discipline, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Discipline::destroy($id);
        return response()->json(null, 204);
    }
}

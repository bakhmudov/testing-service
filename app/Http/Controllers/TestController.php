<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/tests",
     *     operationId="getTestsList",
     *     tags={"Tests"},
     *     summary="Get list of tests",
     *     description="Returns list of tests",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Test"))
     *     ),
     * )
     */
    public function index()
    {
        return Test::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $test = Test::create($request->all());
        return response()->json($test, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Test::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());
        return response()->json($test, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Test::destroy($id);
        return response()->json(null, 204);
    }
}

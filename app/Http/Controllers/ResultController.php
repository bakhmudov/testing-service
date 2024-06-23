<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/results",
     *     operationId="getResultsList",
     *     tags={"Results"},
     *     summary="Get list of results",
     *     description="Returns list of results",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Result"))
     *     ),
     * )
     */
    public function index()
    {
        return Result::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = Result::create($request->all());
        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Result::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $result = Result::findOrFail($id);
        $result->update($request->all());
        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Result::destroy($id);
        return response()->json(null, 204);
    }
}

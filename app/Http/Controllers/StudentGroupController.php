<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/student-groups",
     *     operationId="getStudentGroupsList",
     *     tags={"Student Groups"},
     *     summary="Get list of student groups",
     *     description="Returns list of student groups",
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/StudentGroup"))
     *     ),
     * )
     */
    public function index()
    {
        return StudentGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studentGroup = StudentGroup::create($request->all());
        return response()->json($studentGroup, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return StudentGroup::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $studentGroup = StudentGroup::findOrFail($id);
        $studentGroup->update($request->all());
        return response()->json($studentGroup, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        StudentGroup::destroy($id);
        return response()->json(null, 204);
    }
}

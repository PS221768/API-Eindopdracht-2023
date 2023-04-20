<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SicknessAbsence;

class SicknessAbsenceController extends Controller
{
    public function index()
    {
        $sicknessAbsences = SicknessAbsence::all();

        return response()->json($sicknessAbsences);
    }

    public function show($id)
    {
        $sicknessAbsence = SicknessAbsence::findOrFail($id);

        return response()->json($sicknessAbsence);
    }

    public function store(Request $request)
    {
        $sicknessAbsence = SicknessAbsence::create($request->all());

        return response()->json($sicknessAbsence, 201);
    }

    public function update(Request $request, $id)
    {
        $sicknessAbsence = SicknessAbsence::findOrFail($id);
        $sicknessAbsence->update($request->all());

        return response()->json($sicknessAbsence, 200);
    }

    public function destroy($id)
    {
        $sicknessAbsence = SicknessAbsence::findOrFail($id);
        $sicknessAbsence->delete();

        return response()->json(null, 204);
    }
}

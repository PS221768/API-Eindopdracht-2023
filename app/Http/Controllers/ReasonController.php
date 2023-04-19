<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reason;

class ReasonController extends Controller
{
    public function index ()
    {
        $reasons = Reason::all();
        return response()->json(['data' => $reasons]);
    }

    public function store (Request $request)
    {
        $reason = Reason::create([
            'description' => $request->input('description')
        ]);

        return response()->json(['data' => $reason], 201);
    }

    public function show ($id)
    {
        $reason = Reason::findOrFail($id);
        return response()->json(['data' => $reason]);
    }

    public function update (Request $request, $id)
    {
        $reason = Reason::findOrFail($id);
        $reason->update([
            'description' => $request->input('description')
        ]);

        return response()->json(['data' => $reason]);
    }

    public function destroy ()
    {
        $reason = Reason::findOrFail($id);
        $reason->delete();
        
        return response()->json(['message' => 'Reason deleted successfully']);
    }

}

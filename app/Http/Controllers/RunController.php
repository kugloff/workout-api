<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\Request;

class RunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Run::with(['route', 'tags'])
            ->where('user_id', auth()->id())
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'distance' => 'required|numeric',
            'duration' => 'required|integer',
            'route_id' => 'nullable|exists:routes,id',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('runs', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = auth()->id();

        $run = Run::create($validated);

        return response()->json($run, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Run $run)
    {
        $run = Run::with(['route', 'tags'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return response()->json($run);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Run $run)
    {
        $run = Run::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'date' => 'sometimes|date',
            'distance' => 'sometimes|numeric',
            'duration' => 'sometimes|integer',
            'route_id' => 'nullable|exists:routes,id',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('runs', 'public');
            $validated['image'] = $path;
        }

        $run->update($validated);

        return response()->json($run);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Run $run)
    {
        $run = Run::where('user_id', auth()->id())->findOrFail($id);
        $run->delete();

        return response()->json(['message' => 'Deleted']);
    }
}

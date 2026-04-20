<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function store(Request $request){
        if (!auth()->user()->isAdmin()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|unique:tags,name'
        ]);

        $tag = Tag::create($validated);

        return response()->json($tag, 201);
    }

    public function attachTag(Request $request, $id){
        $run = Run::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'tag_id' => 'required|exists:tags,id'
        ]);

        $run->tags()->attach($request->tag_id);

        return response()->json(['message' => 'Tag attached']);
    }

    public function detachTag(Request $request, $id){
        $run = Run::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'tag_id' => 'required|exists:tags,id'
        ]);

        $run->tags()->detach($request->tag_id);

        return response()->json(['message' => 'Tag detached']);
    }
}

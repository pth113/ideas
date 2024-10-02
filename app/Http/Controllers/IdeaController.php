<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate([
            'idea' => 'required|min:5|max:240',
        ]);
        $idea = new Idea([
            'content' => request()->get('idea', ''),
        ]);
        $idea->save();
        return redirect()->route('dashboard')->with('success', 'Idea created successful');
    }

    public function destroy($id)
    {
        Idea::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successful');
    }
}

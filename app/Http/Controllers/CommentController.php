<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea)
    {
        $comment = new Comment([
            'idea_id' => $idea->id,
            'content' => request()->get('content', ''),
        ]);
        $comment->save();
        return redirect()->route('ideas.show', $idea->id)->with('success', 'Comment created successful');
    }
}

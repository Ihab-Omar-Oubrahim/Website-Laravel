<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ReportModel;
use App\Models\UserComment as ModelsUserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserComment extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Create the main comment
        $comment = ModelsUserComment::create([
            'user_id' => Auth::id(),
            'main_comment' => $request->comment,
        ]);



        return redirect()->back()->with('success', 'Main comment posted successfully!'); // regular
    }



    public function show($id)
    {
        // Fetch the main comment and its replies
        $mainComment = ModelsUserComment::with('replies')->findOrFail($id);

        return view('comments.show', compact('mainComment'));
    }


    public function store_reply(Request $request)
    {
        $request->validate([
            'reply_comment' => 'required|string',
            'comment_id' => 'required|exists:user_comment,id',
        ]);

        // Create the main comment
        Comment::create([
            'user_id' => Auth::id(),
            'comment_id' => $request->comment_id,
            'message' => $request->reply_comment,
        ]);


        return redirect()->back()->with('success', 'Main comment posted successfully!');
    }

    public function reply_show($id) {}

    public function report_comment(Request $request)
    {

        // Validate the input
        $request->validate([
            'comment_id2' => 'required|exists:user_comment,id',
            'report_title' => 'required|string|max:255',
            'report_reason' => 'required|string|max:1000',
        ]);

        // Create a new report
        ReportModel::create([
            'user_id' => Auth::id(),
            'reported_comment_id' => $request->comment_id2,
            'report_title' => $request->report_title,
            'report_reason' => $request->report_reason,
        ]);

        // Return a success message or redirect
        return redirect()->back()->with('success', 'Your report has been submitted.');
    }

    public function delete_comment(Request $request)
    {

        $request->validate([
            'comment_id' => 'required|exists:user_comment,id',
        ]);

        $comment = ModelsUserComment::find($request->comment_id);

        if (!$comment || $comment->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }


    public function update_comment(Request $request, $id)
    {
        if (!$request->has('edited_comment')) {
            return response()->json(['error' => 'No comment content received'], 400);
        }

        $request->validate([
            'edited_comment' => 'required|string|max:1000',
        ]);

        $comment = ModelsUserComment::find($id);

        if (!$comment || Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized or comment not found'], 403);
        }

        // Updating the comment
        $comment->main_comment = $request->edited_comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment edited successfully!');
    }
}

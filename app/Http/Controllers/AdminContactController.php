<?php

namespace App\Http\Controllers;

use App\Models\Offense;
use App\Models\ReportModel;
use App\Models\User;
use App\Models\UserComment;
use App\Models\UserContactMessage;
use App\Models\UserSharedMessage;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function deleteSelected(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:user_contact,id',
            ]);

            // Delete multiple contacts
            $deletedCount = UserContactMessage::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount contact(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:user_contact,id',
            ]);

            $contact = UserContactMessage::find($validated['id']);

            if ($contact) {
                $contact->delete();
                return redirect()->back()->with('success', 'Contact deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete contact.');
        }
    }

    public function delete_shared(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:user_shared_message,id',
            ]);

            // Delete multiple contacts
            $deletedCount = UserSharedMessage::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount shared(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:user_shared_message,id',
            ]);

            $shared = UserSharedMessage::find($validated['id']);

            if ($shared) {
                $shared->delete();
                return redirect()->back()->with('success', 'Shared message deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete the shared message.');
        }
    }



    public function delete_comment(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:user_comment,id',
            ]);

            // Manually delete related reports (in case CASCADE isn't set)
            ReportModel::whereIn('reported_comment_id', $ids)->delete();

            // Delete multiple contacts
            $deletedCount = UserComment::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount comments(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:user_comment,id',
            ]);

            $comment = UserComment::find($validated['id']);

            if ($comment) {
                ReportModel::where('reported_comment_id', $comment->id)->delete();
                $comment->delete();
                return redirect()->back()->with('success', 'Comment deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete contact.');
        }
    }

    public function delete_visitor(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:visitors,id',
            ]);

            // Delete multiple contacts
            $deletedCount = Visitor::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount Visitor(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:visitors,id',
            ]);

            $comment = Visitor::find($validated['id']);

            if ($comment) {
                $comment->delete();
                return redirect()->back()->with('success', 'Visitor deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete contact.');
        }
    }

    public function delete_report(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:reports,id',
            ]);

            // Delete multiple contacts
            $deletedCount = ReportModel::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount Report(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:reports,id',
            ]);

            $report = ReportModel::find($validated['id']);

            if ($report) {
                $report->delete();
                return redirect()->back()->with('success', 'Report deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete contact.');
        }
    }

    public function delete_user_option(Request $request)
    {
        // Decode JSON input (handles both single and multiple IDs)
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // Validate that all IDs exist in the users table
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:users,user_id',
            ]);

            // Delete multiple users
            $deletedCount = User::whereIn('user_id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount User(s) deleted successfully.");
        } else {
            // Validate single user deletion
            $validated = $request->validate([
                'id' => 'required|exists:users,user_id',
            ]);

            $user = User::where('user_id', $validated['id'])->first();

            if ($user) {
                $user->delete();
                return redirect()->back()->with('success', 'User deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete user.');
        }
    }

    public function delete_user_option_from_details(Request $request)
    {
        // Validate that the provided ID exists in the users table
        $validated = $request->validate([
            'id' => 'required|exists:users,user_id',
        ]);

        // Find and delete the user
        User::where('user_id', $validated['id'])->delete();

        // Redirect to users_dashboard.blade.php with success message
        return redirect()->route('dashboard_users')->with('success', 'User deleted successfully.');
    }

    public function delete_offense(Request $request)
    {

        // Check if the input is a single ID or multiple IDs
        $ids = json_decode($request->input('id'), true);

        if (is_array($ids)) {
            // If multiple IDs
            $validated = $request->validate([
                'id' => 'required|json',
                'id.*' => 'exists:offense,id',
            ]);

            // Delete multiple contacts
            $deletedCount = Offense::whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', "$deletedCount offense(s) deleted successfully.");
        } else {
            // If single ID
            $validated = $request->validate([
                'id' => 'required|exists:offense,id',
            ]);

            $offense = Offense::find($validated['id']);

            if ($offense) {
                $offense->delete();
                return redirect()->back()->with('success', 'Offense record deleted successfully.');
            }

            return redirect()->back()->with('error', 'Unable to delete Offense.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Offense;
use App\Models\ReportModel;
use App\Models\User;
use App\Models\UserComment;
use App\Models\UserSharedMessage;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function shared_msgs_search(Request $request)
    {
        $query = $request->input('query', '');
        $sharedMsgs = UserSharedMessage::with('user')
            ->when($query, function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                });
            })
            ->paginate(8); // Paginate the results

        return view('admin.Admin_Dashboard_Pages.shared_msgs_dashboard', compact('sharedMsgs'));
    }

    public function user_comments_search(Request $request)
    {
        $query = $request->input('query', '');
        $userComments = UserComment::with('user')
            ->when($query, function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                });
            })
            ->paginate(8); // Paginate the results

        return view('admin.Admin_Dashboard_Pages.comments_dashboard', compact('userComments'));
    }

    public function report_comments_search(Request $request)
    {
        $query = $request->input('query', '');
        $reportedComments = ReportModel::with('user')
            ->when($query, function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                });
            })
            ->paginate(8); // Paginate the results

        return view('admin.Admin_Dashboard_Pages.reports_dashboard', compact('reportedComments'));
    }

    public function visitors_search(Request $request)
    {
        $query = $request->input('query', '');

        $userVisits = Visitor::with('user')
            ->when($query, function ($q) use ($query) {
                if ($query === 'unknown') {
                    // If the query is 'unknown', filter by NULL user_id
                    $q->whereNull('user_id');
                } else {
                    // Search by user name when it's not 'unknown'
                    $q->whereHas('user', function ($q) use ($query) {
                        $q->where('name', 'like', "%$query%");
                    });
                }
            })
            ->paginate(8); // Paginate the results

        return view('admin.Admin_Dashboard_Pages.visitors_dashboard', compact('userVisits'));
    }

    public function users_search(Request $request)
    {
        $query = $request->input('query', '');

        $usersAccount = User::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%$query%");
        })->paginate(8);

        return view('admin.Admin_Dashboard_Pages.users_dashboard', compact('usersAccount'));
    }

    public function offense_search(Request $request)
    {
        $query = $request->input('query', '');
        $offenseUsers = Offense::with('user')
            ->when($query, function ($q) use ($query) {
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                });
            })
            ->paginate(8); // Paginate the results

        return view('admin.Admin_Dashboard_Pages.offense_dashboard', compact('offenseUsers'));
    }
}

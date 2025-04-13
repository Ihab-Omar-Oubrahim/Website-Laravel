<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Offense;
use App\Models\ReportModel;
use App\Models\User;
use App\Models\UserComment;
use App\Models\UserContactMessage;
use App\Models\UserSharedMessage;
use App\Models\Visitor;
use App\Models\Website\HomeLandingS1Intro;
use App\Models\Website\HomeLandingS2Info;
use App\Models\Website\HomeLandingS3Idea;
use App\Models\Website\WebPageModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $contactsCount = UserContactMessage::count();
        $commentsCount = Comment::count();
        $sharedMsgsCount = UserSharedMessage::count();
        $usersCount = User::count();
        $viewCount = Visitor::count();
        $reportCount = ReportModel::count();
        $OffenseCount = Offense::count();


        return view('admin.dashboard', compact(
            'usersCount',
            'sharedMsgsCount',
            'commentsCount',
            'contactsCount',
            'viewCount',
            'reportCount',
            'OffenseCount',
        ));
    }

    public function dashbord_contact()
    {
        // Contacts
        $contacts = UserContactMessage::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.Admin_Dashboard_Pages.contacts_dashboard', compact('contacts'));
    }

    public function dashbord_shared()
    {
        // Shared Messages
        $sharedMsgs = UserSharedMessage::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.Admin_Dashboard_Pages.shared_msgs_dashboard', compact('sharedMsgs'));
    }

    public function dashboard_comments()
    {
        $userComments = UserComment::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.Admin_Dashboard_Pages.comments_dashboard', compact('userComments'));
    }

    public function dashboard_reports()
    {
        $reportedComments = ReportModel::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.Admin_Dashboard_Pages.reports_dashboard', compact('reportedComments'));
    }

    public function dashboard_visits()
    {
        $userVisits = Visitor::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.Admin_Dashboard_Pages.visitors_dashboard', compact('userVisits'));
    }

    public function dashboard_users()
    {
        $usersAccount = User::orderBy('created_at', 'desc')->paginate(9);
        // $usersAccount = User::with('visitors')->orderBy('created_at', 'desc')->paginate(9);


        return view('admin.Admin_Dashboard_Pages.users_dashboard', compact('usersAccount'));
    }


    public function dashboard_users_details($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('admin.Admin_Dashboard_Pages.Details.users_details_dashboard', compact('user'));
    }

    public function dashboard_offense()
    {
        $offenseUsers = Offense::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('admin.Admin_Dashboard_Pages.offense_dashboard', compact('offenseUsers'));
    }

    public function dashboard_offense_details($user_id, $offense_id)
    {
        $user = User::findOrFail($user_id);

        // Get the specific offense using both user_id and offense_id
        $offense = Offense::where('id', $offense_id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        // Get all offenses related to this user except the current one
        $banHistory = Offense::where('user_id', $user_id)
            ->where('id', '!=', $offense_id) // Exclude the current offense
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.Admin_Dashboard_Pages.Details.user_offense_details', compact('user', 'offense', 'banHistory'));
    }

    public function dashboard_modify_web()
    {

        $pages = WebPageModel::all();

        return view('admin.Modify_Website.modify_web', compact('pages'));
    }

    public function modify_home_landing($id_page)
    {

        $HomeLandingPageItem = HomeLandingS1Intro::where('id_page', $id_page)->first();
        $HomeLandingPageInfo = HomeLandingS2Info::where('id_page', $id_page)->first();
        $HomeLandingPageIdea = HomeLandingS3Idea::where('id_page', $id_page)->first();
        $page = WebPageModel::where('id_page', $id_page)->firstOrFail();

        return view('admin.Modify_Website.Details_Modify_Web.HomeLanding_Modify',
        compact('HomeLandingPageItem',
        'HomeLandingPageInfo',
        'HomeLandingPageIdea',
        'page'));
    }



    public function search(Request $request)
    {
        // Get the search query from the input
        $query = $request->input('query', ''); // Default to empty string if no query

        // Fetch contacts where the user's name matches the query
        $contacts = UserContactMessage::with('user')
            ->when($query, function ($q) use ($query) {
                // If there is a search query, filter by user name
                $q->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                });
            })
            ->paginate(8); // Paginate the results

        // Return the same view with the contacts and query input
        return view('admin.Admin_Dashboard_Pages.contacts_dashboard', compact('contacts'));
    }

    public function attachment_download(Request $request)
    {
        // Get the filename from the query string
        $filename = $request->query('file');

        // Check if the filename is provided
        if (!$filename) {
            return abort(404, 'File not specified.');
        }

        // Define the path to your private folder
        $filePath = storage_path('app/private/' . $filename); /* /Contact_File/{file_name} from db */

        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        // If the file doesn't exist, return a 404 error
        return abort(404, 'File not found.');
    }
}

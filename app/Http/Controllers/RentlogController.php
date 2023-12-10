<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentlogController extends Controller
{
    public function index()
    {

        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('rent-log', ['rentlogs' => $rentlogs]);
    }

    public function rentlogs(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Start building the base query to retrieve rent logs with user and book relationships
        $rentlogsQuery = RentLogs::with(['user', 'book'])->where('user_id', $user->id);

        // Check if there is a search query in the request
        if ($request->has('title')) {
            // If there is a search query, get the 'title' parameter from the request
            $title = $request->input('title');

            // Add a condition to the query to filter rent logs based on book title
            $rentlogsQuery->whereHas('book', function ($query) use ($title) {
                // Use a 'like' condition to match partial titles
                $query->where('title', 'like', "%$title%");
            });
        }

        // Execute the final query and get the results
        $rentlogs = $rentlogsQuery->get();

        // Pass the results to the 'rentlog' view
        return view('rentlog', ['rentlogs' => $rentlogs]);
    }
}

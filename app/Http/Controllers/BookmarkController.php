<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class BookmarkController extends Controller
{
	// @desc Get all users bookmarks
	// @route GET /bookmarks
	public function index(): View
	{
		$user = Auth::user();

		$bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(6);
		return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
	}

	// @desc Create new bookmarked job
	// @route POST /bookmarks/{$job}
	public function store(Job $job): RedirectResponse
	{
		$user = Auth::user();

		// Check if the job is alreade bookmarked
		if ($user->bookmarkedJobs()->where('job_id', $job->id)->first()) {
			return back()->with('error', 'Job is already bookmarked');
		}

		// Create new bookmark
		$user->bookmarkedJobs()->attach($job->id);
		return back()->with('success', 'Job bookmarked successfully');
	}
}

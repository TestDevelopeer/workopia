<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
	// @desc Get all users bookmarks
	// @route GET /bookmarks
	public function index(): View
	{
		$user = Auth::user();

		$bookmarks = $user->bookmarkedJobs()->paginate(6);
		return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
	}
}

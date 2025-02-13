<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ApplicantController extends Controller
{
	// @desc Store new job application
	// @route POST /jobs/{job}/apply
	public function store(Request $request, Job $job): RedirectResponse
	{
		// Validate the request
		$validatedData = $request->validate([
			'full_name' => 'required|string',
			'contact_phone' => 'string',
			'contact_email' => 'required|string|email',
			'message' => 'string',
			'location' => 'string',
			'resume' => 'file|mimes:pdf|max:2048',
		]);

		// Handle resume upload
		if ($request->hasFile('resume')) {
			$path = $request->file('resume')->store('resumes', 'public');
			$validatedData['resume_path'] = $path;
		}

		// Store the application
		$application = new Applicant($validatedData);
		$application->job_id = $job->id;
		$application->user_id = auth()->id();
		$application->save();

		return redirect()->back()->with('success', 'Your application has been submitted');
	}

	// @desc Delete job applicant
	// @route DELETE /applicants/{applicant}
	public function destroy($id): RedirectResponse
	{
		$applicant = Applicant::findOrFail($id);
		$applicant->delete();

		return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully!');
	}
}

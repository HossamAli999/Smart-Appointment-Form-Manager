<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\StudentSubmission;
use Illuminate\Http\Request;

class StudentSubmissionController extends Controller
{
    // Show form to student for submission
    public function showForm($uuid)
    {
        $form = Form::where('uuid', $uuid)->firstOrFail();
        return view('student.submit', compact('form'));
    }

    // Handle student submission
public function submitForm(Request $request, $uuid)
{
    // Find the form by its UUID
    $form = Form::where('uuid', $uuid)->firstOrFail();

    // Validate the incoming data
    $validated = $request->validate([
        'student_name' => 'required|string',
        'phone' => 'required|string', 
        'date' => 'required|string',
        'class' => 'required|string',
    ]);

    // Create a new student submission record
    StudentSubmission::create([
        'form_id' => $form->id,
        'student_name' => $validated['student_name'],
        'phone' => $validated['phone'],
        'class' => $validated['class'],
        'date' => $validated['date'],
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Your submission has been successfully received.');
}

}

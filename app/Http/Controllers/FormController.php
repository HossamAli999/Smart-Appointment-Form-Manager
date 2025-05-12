<?php
namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\StudentSubmission;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentSubmissionsExport;
use App\SubmissionsExport;  // Update the import path
use Symfony\Component\HttpFoundation\StreamedResponse;


class FormController extends Controller
{
    // Display all forms created by the teacher
        public function index()
        {
            $forms = Form::where('user_id', auth()->id())->latest()->get();

            return view('forms.index', compact('forms'));
        }

    // Show the form to create a new form
    public function create()
    {
        return view('forms.create');
    }

    // Store the new form
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'date_options' => 'nullable|string',
        'max_submissions' => 'nullable|integer|min:1',
    ]);

    Form::create([
        'name' => $request->name,
        'date_options' => $request->date_options,
        'max_submissions' => $request->max_submissions,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('forms.index')->with('success', 'Form created successfully.');
}


    // Show submissions for a specific form
public function submissions(Form $form)
{
    if ($form->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    $submissions = StudentSubmission::where('form_id', $form->id)->get();
    return view('forms.submissions', compact('form', 'submissions'));
}


    // Export submissions to Excel



public function exportCSV(Form $form)
{
    $filename = 'submissions_form_' . $form->id . '.csv';

    $submissions = $form->submissions;

    $headers = [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ];

    $columns = ['Student Name', 'Phone', 'Date', 'class'];

    $callback = function () use ($submissions, $columns) {
        $file = fopen('php://output', 'w');

        // Add BOM to make sure Excel reads UTF-8 properly
        echo "\xEF\xBB\xBF";

        fputcsv($file, $columns);

        foreach ($submissions as $submission) {
            fputcsv($file, [
                $submission->student_name,
                $submission->phone,
                $submission->date,
                $submission->class,
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}



}

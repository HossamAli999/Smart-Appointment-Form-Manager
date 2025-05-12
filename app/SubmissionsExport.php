// app/SubmissionsExport.php

namespace App;

use Maatwebsite\Excel\Concerns\FromCollection; // Ensure this import is present
use App\Models\StudentSubmission;

class SubmissionsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return StudentSubmission::all(); // Fetch all student submissions
    }
}

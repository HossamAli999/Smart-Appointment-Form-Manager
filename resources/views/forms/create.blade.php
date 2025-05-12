@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-file-earmark-plus me-2"></i>Create Form</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('forms.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Form Name <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-input-text"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required placeholder="Enter form name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
    <label for="max_submissions" class="form-label">Maximum Submissions Allowed <span class="text-muted">(Optional)</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person-check"></i></span>
        <input type="number" class="form-control @error('max_submissions') is-invalid @enderror"
               id="max_submissions" name="max_submissions" min="1"
               placeholder="e.g. 50 (leave blank for unlimited)">
        @error('max_submissions')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

                        <div class="mb-4">
    <label class="form-label">Available Dates for Students</label>
    <div id="date-picker-list" class="mb-2">
        <input type="date" class="form-control mb-2 date-picker" onchange="addDate(this)">
    </div>
    <input type="hidden" name="date_options" id="date-options-input">
    <div id="selected-dates-list" class="small text-muted"></div>
</div>

<script>
    let selectedDates = [];

    function addDate(input) {
        const date = input.value;
        if (date && !selectedDates.includes(date)) {
            selectedDates.push(date);
            document.getElementById('date-options-input').value = JSON.stringify(selectedDates);
            const list = document.getElementById('selected-dates-list');
            const entry = document.createElement('div');
            entry.innerText = date;
            list.appendChild(entry);
            input.value = ''; // reset input
        }
    }
</script>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="bi bi-plus-circle me-2"></i> Create Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //prevent form resubmission
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
@endsection

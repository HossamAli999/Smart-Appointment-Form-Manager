@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h2 class="card-title mb-0"><i class="bi bi-file-earmark-text me-2"></i>{{ $form->name }}</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('forms.submit', $form->uuid) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-4">
                            <label for="student_name" class="form-label">Student Name <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" required placeholder="Enter student name">
                                @error('student_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone Number <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required placeholder="Enter phone number">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
    <label for="class" class="form-label">Class (الشعبة) <span class="text-muted">(Required)</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
        <select class="form-select @error('class') is-invalid @enderror" id="class" name="class" required>
            <option value="" selected disabled>اختر الشعبة</option>
            <option value="علمي علوم">علمي علوم</option>
            <option value="علمي رياضة">علمي رياضة</option>
            <option value="أدبي">أدبي</option>
        </select>
        @error('class')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


                       <div class="mb-4">
    <label for="date" class="form-label">Select Date <span class="text-muted">(Required)</span></label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
        <select class="form-select @error('date') is-invalid @enderror" id="date" name="date" required>
            <option value="" selected disabled>Choose a date</option>
            @foreach(json_decode($form->date_options ?? '[]') as $date)
                <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('Y-m-d') }}</option>
            @endforeach
        </select>
        @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="bi bi-check-circle me-2"></i> Submit
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

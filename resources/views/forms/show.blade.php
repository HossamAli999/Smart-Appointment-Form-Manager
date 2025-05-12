@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h3 class="card-title mb-0"><i class="bi bi-file-earmark-text me-2"></i>{{ $form->name }} - Form Submission</h3>
                    <p class="small text-white-50 mb-0"><i class="bi bi-calendar-date me-1"></i>Form Date: {{ $form->date }}</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('form.submit', $form->uuid) }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="student_name" class="form-label">Student Name <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="student_name" id="student_name" class="form-control @error('student_name') is-invalid @enderror" value="{{ old('student_name') }}" required placeholder="Enter Student Name">
                                @error('student_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="phone_number" class="form-label">Phone Number <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required placeholder="Enter Phone Number">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="date" class="form-label">Date <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="class" class="form-label">Class (الشعبة) <span class="text-muted">(Required)</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                <input type="text" name="class" id="class" class="form-control @error('class') is-invalid @enderror" value="{{ old('class') }}" required placeholder="Enter Class">
                                @error('class')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill shadow-sm">
                            <i class="bi bi-check-circle me-2"></i> Submit Form
                        </button>
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

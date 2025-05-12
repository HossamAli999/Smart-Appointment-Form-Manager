@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Your Forms</h2>
        <a href="{{ url('/forms/create') }}" class="btn btn-primary rounded-pill shadow-sm">
            <i class="bi bi-plus-circle me-2"></i> Create New Form
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Form Name</th>
                            <th>Submissions</th>
                            <th>Share Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($forms as $form)
                        <tr>
                            <td>
                                <i class="bi bi-file-earmark-text me-2 text-secondary"></i> {{ $form->name }}
                            </td>
                            <td>
                                <span class="badge bg-secondary rounded-pill">{{ $form->submissions->count() }}</span>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm rounded-pill" readonly value="{{ url('/form/' . $form->uuid) }}" id="shareLink{{ $form->id }}">
                                    <button class="btn btn-outline-secondary btn-sm rounded-pill" type="button" onclick="copyLink('shareLink{{ $form->id }}')">
                                        <i class="bi bi-link-45deg"></i> Copy
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ url('/forms/'.$form->id.'/submissions') }}" class="btn btn-sm btn-info rounded-pill">
                                        <i class="bi bi-eye me-1"></i> View
                                    </a>
                                    <a href="{{ url('/forms/'.$form->id.'/export') }}" class="btn btn-sm btn-success rounded-pill">
                                        <i class="bi bi-download me-1"></i> Export
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">
                                <i class="bi bi-folder-x text-muted me-2" style="font-size: 1.5em;"></i> No forms created yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function copyLink(inputId) {
        const inputElement = document.getElementById(inputId);
        inputElement.select();
        document.execCommand('copy');
        alert('Link copied!');
    }
</script>
@endsection
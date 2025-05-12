@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Submissions for "{{ $form->name }}"</h2>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $submission)
            <tr>
                <td>{{ $submission->student_name }}</td>
                <td>{{ $submission->phone }}</td>
                <td>{{ $submission->date }}</td>
                <td>{{ $submission->class }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

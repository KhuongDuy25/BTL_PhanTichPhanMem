<!-- Display all job types -->
@extends ('layouts.app')
@section('main')
<div class="container manage-category mt-4">
    <a href="{{ route('admin.jobType.create') }}" class="btn btn-primary">Create Type</a>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Job Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobTypes as $jobType)
            <tr>
                <td>{{ $jobType->id }}</td>
                <td>{{ $jobType->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends ('layouts.app')
@section('main')
<div class="success-message">
    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<!-- add job type -->
<form action="{{ route('admin.jobType.store') }}" method="post" class="container mt-4 mb-4">
    @csrf
    <div class="form-group">
        <label for="type">Job Type</label>
        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control">
        @error('name')
            <div class="error-validate mt-3">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
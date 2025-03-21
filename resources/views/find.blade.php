@extends('layouts.app')
@section('main')
<style>
.job-description {
    display: -webkit-box;
    line-clamp: 3;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>

<section class="section-3 py-5 bg-2">
    <div class="container">
        <form action="{{ route('findjob') }}" method="GET">
            <div class="row">
                <div class="col-6 col-md-10">
                    <h2>Find Jobs</h2>
                </div>
                <div class="col-6 col-md-2">
                    <div class="align-end">
                        <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-4 col-lg-3 sidebar mb-4">
                    <div class="card border-0 shadow p-4">
                        <div class="mb-4">
                            <h2>Keywords</h2>
                            <input type="text" name="keywords" placeholder="Keywords" class="form-control"
                                value="{{ request('keywords') }}">
                        </div>

                        <div class="mb-4">
                            <h2>Location</h2>
                            <input type="text" name="location" placeholder="Location" class="form-control"
                                value="{{ request('location') }}">
                        </div>

                        <div class="mb-4">
                            <h2>Category</h2>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <h2>Job Type</h2>
                            @foreach ($jobTypes as $jobType)
                            <div class="form-check mb-2">
                                <input class="form-check-input" name="job_types[]" type="checkbox"
                                    value="{{ $jobType->id }}" id="job-type-{{ $jobType->id }}"
                                    {{ in_array($jobType->id, request('job_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="job-type-{{ $jobType->id }}">{{ $jobType->name }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="mb-4">
                            <h2>Experience</h2>
                            <select name="experience" id="experience" class="form-control">
                                <option value="">Select Experience</option>
                                @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}"
                                    {{ request('experience') == $i ? 'selected' : '' }}>{{ $i }}
                                    Year{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                    <option value="10+" {{ request('experience') == '10+' ? 'selected' : '' }}>10+ Years
                                    </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('find') }}" class="btn btn-secondary mt-3">Reset</a>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="job_listing_area">
                        @if($jobs->isEmpty())
                        <div class="alert alert-warning" role="alert">
                            No jobs found.
                        </div>
                        @else
                        <div class="job_lists">
                            <div class="row">
                                @foreach ($jobs as $job)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                            <p class="job-description">{{ $job->description }}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0 job-item">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1 location">{{ $job->company_location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $job->jobType->name }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                    <span class="ps-1">{{ $job->salary }}</span>
                                                </p>
                                            </div>
                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail', $job->id) }}"
                                                    class="btn btn-primary btn-lg">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{ $jobs->appends(request()->query())->links() }}
                        </div>
                        @endif
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.5.1.3.min.js"></script>
<script src="assets/js/instantpages.5.1.0.min.js"></script>
<script src="assets/js/lazyload.17.6.0.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/lightbox.min.js"></script>
<script src="assets/js/custom.js"></script>
@endsection
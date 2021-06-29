@extends('layouts.app')

@section('title', 'Jobs')

@section('content')


    <div class="content">
        <div class="page-inner">
            @forelse($jobs as $job)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <div class="d-flex justify-content-between mt-1">
                            <h6 class="card-subtitle mb-2 text-muted">Published On: {{ date('F j, Y', strtotime($job->created_at)) }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Seats Available: {{ $job->no_of_seats }}</h6>
                        </div>
                        <p class="card-text">Campus: {{ $job->campus->name }}</p>
                        <p class="card-text">Department: {{ $job->department->name }}</p>
                        <p class="card-text">Educational Requirement: {{ $job->education_types->education }}</p>
                        <p class="card-text">Minimum Experience: {{ $job->minimum_experience == 0 ? 'Fresher' : $job->minimum_experience.' Years' }}</p>
                        <p class="card-text">Last Submission Date: {{ date('F j, Y', strtotime($job->last_submission_date)) }}</p>
                        <p class="card-text">{{ $job->description }}</p>
                        <a href="{{ base_url('jobapply/apply'.$job->id) }}" class="btn btn-sm btn-primary">Apply to Job</a>
                    </div>
                </div>
            @empty
                <div class="card-body">
                    <p>No Jobs Available</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection
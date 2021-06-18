@extends("layouts.app")

@section("title", "Job Posts")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-title">
                                        Job Posts
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ base_url('jobpost/add') }}" class="btn btn-sm btn-primary">Add Post</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Campus</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Minimum Requirement</th>
                                    <th scope="col">No. of Seats</th>
                                    <th scope="col">Experience</th>
                                    <th scope="col">Last Submission Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($job_posts as $job_post)
                                    <tr>
                                        <td>{{ $job_post->title }}</td>
                                        <td>{{ $job_post->campus->name }}</td>
                                        <td>{{ $job_post->department->name }}</td>
                                        <td>{{ $job_post->education_types->education }}</td>
                                        <td>{{ $job_post->no_of_seats }}</td>
                                        <td>{{ $job_post->minimum_experience == 0 ? 'Fresher' : $job_post->minimum_experience.' Years' }}</td>
                                        <td>{{ $job_post->last_submission_date }}</td>
                                        <td>
                                            @if($job_post->is_publish == 1)
                                                <a href="{{ base_url('jobpost/update_jobstatus/'.$job_post->id) }}" class="btn btn-sm btn-primary">Active</a>
                                            @else
                                                <a href="{{ base_url('jobpost/update_jobstatus/'.$job_post->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                            @endif
                                            <a href="{{ base_url('jobpost/edit/'.$job_post->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ base_url('jobpost/delete/'.$job_post->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
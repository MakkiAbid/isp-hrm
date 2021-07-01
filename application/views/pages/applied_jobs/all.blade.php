@extends("layouts.app")

@section("title", "Job Statuses")

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
                                        Job Statuses
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Campus</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Applied at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($applied_jobs as $applied_job)
                                    <tr>
                                        <td>{{ $applied_job->job_post->title }}</td>
                                        <td>{{ $applied_job->job_post->department->name }}</td>
                                        <td>{{ $applied_job->job_post->campus->name }}</td>
                                        <td>
                                            <div class="badge badge-success">
                                                Applied!
                                            </div>
                                        </td>
                                        <td>{{ date("l jS \of F Y h:i:s A", strtotime($applied_job->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="3">You doesnt apply to any job yet!</td>
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
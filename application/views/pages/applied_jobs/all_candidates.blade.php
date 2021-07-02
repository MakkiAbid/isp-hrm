@extends("layouts.app")

@section("title", "Applied Candidates")

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
                                        Applied Candidates
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Campus</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($applied_candidates as $applied_candidate)
                                    <tr>
                                        <td>{{ $applied_candidate->user->name }}</td>
                                        <td>{{ $applied_candidate->job_post->title }}</td>
                                        <td>{{ $applied_candidate->job_post->campus->name }}</td>
                                        <td>{{ $applied_candidate->job_post->department->name }}</td>
                                        <td>
                                            <a href="{{ base_url('jobapply/resume/'.$applied_candidate->user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-file"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">No Data Found</td>
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
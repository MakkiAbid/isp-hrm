@extends("layouts.app")

@section("title", "All Candidates")

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
                                        All Candidates
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ current_url() }}" method="get">
                                <div class="row d-flex justify-content-end">
                                    <div id="basic-datatables_filter" class="dataTables_filter mr-3">
                                        <label>Search:<input name="search-term" type="search" class="form-control" placeholder=""></label>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($candidates as $candidate)
                                    <tr>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->role }}</td>
                                        <td>
                                            <a href="{{ base_url('candidates/delete/'.$candidate->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                {!! $links !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
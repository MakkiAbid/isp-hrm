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
                                <div class="row">
                                    <div class="col-10">
                                        <div id="basic-datatables_filter" class="dataTables_filter ml-3">
                                            <label>Search:</label>
                                            <input name="search-term" type="search" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary btn-sm mt-4">Search</button>
                                        <a href="{{ base_url('usersdetails') }}" class="btn btn-info btn-sm mt-4">Advance Search</a>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">CNIC #</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($candidates as $candidate)
                                    <tr>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->role }}</td>
                                        <td>{{ $candidate->personal_info->city }}</td>
                                        <td>{{ $candidate->personal_info->address }}</td>
                                        <td>{{ $candidate->personal_info->gender }}</td>
                                        <td>{{ $candidate->personal_info->cnic }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="{{ base_url('candidates/fetch_details/'.$candidate->id) }}" class="btn btn-sm btn-primary fetch-btn">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                            <a href="{{ base_url('candidates/delete/'.$candidate->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">No Data Found</td>
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


    <!-- Modal -->
    <div class="modal fade" id="CandidateDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">More Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends("layouts.app")

@section("title", "Advance Search | Candidates")

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
                                        Find Details
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ current_url() }}" method="get">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="basic-datatables_filter" class="dataTables_filter ml-3">
                                                <label>Overall Search:</label>
                                                <input name="search-term" type="search" class="form-control" placeholder="Search anything among candidates...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <label>Search By Name:</label>
                                                <input name="search-by-name" type="search" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <label>Search By Email:</label>
                                                <input name="search-by-email" type="search" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <label>Search By Institute:</label>
                                                <input name="search-by-institute" type="search" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <label>Search By Company:</label>
                                                <input name="search-by-company" type="search" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <label>Search By Designation:</label>
                                                <input name="search-by-designation" type="search" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-2">
                                                <label>Search By Experience:</label>
                                                <input name="search-by-totalexp" type="search" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block" type="submit">Advance Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Institute</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Total Experience</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data  as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->institute }}</td>
                                        <td>{{ $user->company }}</td>
                                        <td>{{ $user->designation }}</td>
                                        <td>{{ $user->total_exp == 0 ? 'Fresher' : $user->total_exp.' Years' }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ base_url('jobapply/resume/'.$user->u_id) }}"><i class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">No Data Found</td>
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
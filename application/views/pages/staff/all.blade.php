@extends("layouts.app")

@section("title", "All Staff")

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
                                        All Staff
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ base_url('staff/add') }}" class="btn btn-sm btn-primary">Add Staff</a>
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
                                    <th scope="col">City</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">CNIC #</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($staffs as $staff)
                                        <tr>
                                            <td>{{ $staff->name }}</td>
                                            <td>{{ $staff->email }}</td>
                                            <td>{{ $staff->role }}</td>
                                            <td>{{ $staff->personal_info->city }}</td>
                                            <td>{{ $staff->personal_info->address }}</td>
                                            <td>{{ $staff->personal_info->gender }}</td>
                                            <td>{{ $staff->personal_info->cnic }}</td>
                                            <td>
                                                <a href="{{ base_url('staff/edit/'.$staff->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{ base_url('staff/delete/'.$staff->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
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
@endsection
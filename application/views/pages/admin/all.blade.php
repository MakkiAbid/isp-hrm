@extends("layouts.app")

@section("title", "All Admin")

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
                                    All Admins
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="{{ base_url('admin/add') }}" class="btn btn-sm btn-primary">Add Admin</a>
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
                        <table id="all-admins" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->role }}</td>
                                        <td>
                                            <a href="{{ base_url('admin/edit/'.$admin->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ base_url('admin/delete/'.$admin->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
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
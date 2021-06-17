@extends("layouts.app")

@section("title", "All Departments")

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
                                        All Department
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ base_url('departments/add') }}" class="btn btn-sm btn-primary">Add Department</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->city }}</td>
                                        <td>
                                            <a href="{{ base_url('departments/edit/'.$department->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ base_url('departments/delete/'.$department->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
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
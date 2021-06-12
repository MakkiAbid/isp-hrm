@extends('layouts.app')

@section("title", "All Education")

@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card-title">
                                    All Education
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="{{ base_url('education/add') }}" class="btn btn-sm btn-primary">Add Education</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Marks Type</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($education_types as $education)
                            <tr>
                                <td>{{ $education->education }}</td>
                                <td>{{ ucwords($education->marks_type )}}</td>
                                <td>
                                    <a href="{{ base_url('education/edit/'.$education->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ base_url('education/delete/'.$education->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
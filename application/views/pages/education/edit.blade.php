@extends('layouts.app')

@section("title", "Edit Education")

@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="card-title">
                                        Edit Education
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input name="education" type="text" class="form-control" id="education" value="{{ $education_type->education }}">
                                <div class="invalid-feedback education-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="marks_type">Marks Type</label>
                                <select name="marks_type" id="marks_type" class="form-control">
                                    <option {{ $education_type->marks_type == 'percentage' ? 'selected' : '' }} value="percentage">Percentage</option>
                                    <option {{ $education_type->marks_type == 'cgpa' ? 'selected' : '' }} value="cgpa">CGPA</option>
                                    <option {{ $education_type->marks_type == 'grade' ? 'selected' : '' }} value="grade">Grade</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary btn-sm">Update Education</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
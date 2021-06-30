@extends('layouts.app')

@section("title", "Add Education")

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
                                        Add Education
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input name="education" type="text" class="form-control" id="education" placeholder="Matriculation, Intermediate etc.">
                                <div class="invalid-feedback education-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="marks_type">Marks Type</label>
                                <select name="marks_type" id="marks_type" class="form-control">
                                    <option value="percentage">Percentage</option>
                                    <option value="cgpa">CGPA</option>
                                    <option value="grade">Grade</option>
                                </select>
                                <div class="invalid-feedback marks_type-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input name="duration" type="text" class="form-control" id="duration" placeholder="2 Years, 4 Years etc.">
                                <div class="invalid-feedback duration-feedback"></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary btn-sm">Add Education</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
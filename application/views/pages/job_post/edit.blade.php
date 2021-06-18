@extends("layouts.app")

@section("title", "Edit Job Post")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Edit Job Post
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="department_id" id="department_id">
                                            @foreach($departments as $department)
                                                <option @if($department->id == $job_post->department->id) 'selected' @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback department_id-feedback"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="education_types_id" id="education_types_id">
                                            @foreach($education_types as $education_type)
                                                <option @if($education_type->id == $job_post->education_types->id) selected @endif value="{{ $education_type->id }}">{{ $education_type->education }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback education_types_id-feedback"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="campus_id" id="campus_id">
                                            @foreach($campuses as $campus)
                                                <option @if($campus->id == $job_post->campus->id) selected @endif  value="{{ $campus->id }}">{{ $campus->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback campus_id-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Job Title</label>
                                        <input value="{{ $job_post->title }}" name="title" type="text" class="form-control" id="title" placeholder="Title">
                                        <div class="invalid-feedback title-feedback"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="no_of_seats">No. of Seats</label>
                                                <input value="{{ $job_post->no_of_seats }}" name="no_of_seats" type="number" class="form-control" id="no_of_seats" placeholder="e.g. 2">
                                                <div class="invalid-feedback no_of_seats-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="minimum_experience">Experience Required</label>
                                                <select class="form-control" name="minimum_experience" id="minimum_experience">
                                                    @for($i = 0; $i <= 25; $i++ )
                                                        <option @if($job_post->minimum_experience == $i) selected @endif value="{{ $i }}">{{ ($i === 0) ? 'Fresher' : $i.' Years' }}</option>
                                                    @endfor
                                                </select>
                                                <div class="invalid-feedback minimum_experience-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="last_submission_date">Last Submission Date</label>
                                                <input value="{{ $job_post->last_submission_date }}" class="form-control" name="last_submission_date" type="date" id="last_submission_date">
                                                <div class="invalid-feedback last_submission_date-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $job_post->description }}</textarea>
                                        <div class="invalid-feedback description-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary">Update Job Post</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
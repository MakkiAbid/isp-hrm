@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="content">
        <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="card-title">
                                            Edit Profile
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="personal_info-tab" data-toggle="tab" href="#personal_info" role="tab" aria-controls="personal_info" aria-selected="true">Personal Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">Education</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                {{-- Personal Information --}}
                                @include('pages.profile.profile_info_tab')
                                {{-- Education TAB --}}
                                @include('pages.profile.education_tab')
                                {{-- Experience --}}
                                @include('pages.profile.experience_tab')
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $('#education-tab').on('click', function () {
            EDUCATION_FORM.GET_EDUCATIONAL_DEGREES();
        });

        let total_fields = 0;
        function add_experience() {
            $('#experience_wrapper').append(
                `<div class="row mb-2 experience_row_wrapper" id="experience_row_wrapper_${total_fields}">` +
                    `<div class="col-3">` +
                        `<label class="d-block"><strong>Company</strong></label>` +
                        `<input type="text" class="form-control" name="experience[${total_fields}][company]" >` +
                    `</div>` +
                    `<div class="col-3">` +
                        `<label class="d-block"><strong>Designation</strong></label>` +
                        `<input type="text" class="form-control" name="experience[${total_fields}][designation]" >` +
                    `</div>` +
                    `<div class="col-2">` +
                        `<label class="d-block"><strong>From</strong></label>` +
                        `<input type="date" class="form-control" name="experience[${total_fields}][start_date]" >` +
                    `</div>` +
                    `<div class="col-2">` +
                        `<label class="d-block"><strong>To</strong></label>` +
                        `<input type="date" class="form-control" name="experience[${total_fields}][end_date]" >` +
                    `</div>` +
                    `<div class="col-2">` +
                        `<label class="d-block"><strong>&nbsp;</strong></label>` +
                        `<div class="btn btn-sm btn-danger mt-1" id="remove_experience" onclick="remove_experience(${total_fields})"><i class="fas fa-times"/></div>` +
                    `</div>` +
                    `<div class="col-12">` +
                        `<hr>` +
                    `</div>` +
                `</div>`
            )
            $('#save-btn-ex').removeClass('d-none');
            total_fields++;
        }

        function remove_experience(row_no) {
            $(`#experience_row_wrapper_${row_no}`).remove();
            if ($('.experience_row_wrapper').length === 0) {
                $('#save-btn-ex').addClass('d-none');
            }
        }

    </script>

@endsection
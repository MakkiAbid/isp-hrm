@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="content">
        <div class="page-inner">
            <form action="" method="POST">
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
                                            <a class="nav-link" id="personal_info-tab" data-toggle="tab" href="#personal_info" role="tab" aria-controls="personal_info" aria-selected="true">Personal Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">Education</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Professional Experience</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                {{-- Personal Information --}}
                                <div class="tab-pane fade" id="personal_info" role="tabpanel" aria-labelledby="personal_info-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="h3" for="name">Name</h3>
                                                <input name="name" value="" type="text" class="form-control">
                                                <div class="invalid-feedback name-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3">Email</h3>
                                                <input name="email" value="" type="text" class="form-control">
                                                <div class="invalid-feedback email-feedback"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="h3" for="city">City</h3>
                                                <input name="city" value="" type="text" class="form-control">
                                                <div class="invalid-feedback city-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3" for="address">Address</h3>
                                                <input name="address" value="" type="text" class="form-control">
                                                <div class="invalid-feedback address-feedback"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="h3" for="dob">Date of Birth</h3>
                                                <input name="name" value="" type="date" class="form-control">
                                                <div class="invalid-feedback date-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3" for="gender">Gender</h3>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                </select>
                                                <div class="invalid-feedback gender-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3" for="marital">Marital Status</h3>
                                                <select name="marital" id="marital" class="form-control">
                                                    <option value="">Set Status</option>
                                                    <option value="">Single</option>
                                                </select>
                                                <div class="invalid-feedback gender-feedback"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="h3" for="nationality">Nationality</h3>
                                                <input name="nationality" value="" type="date" class="form-control">
                                                <div class="invalid-feedback nationality-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3" for="religion">Religion</h3>
                                                <input name="religion" value="" type="date" class="form-control">
                                                <div class="invalid-feedback religion-feedback"></div>
                                            </div>
                                            <div class="col">
                                                <h3 class="h3" for="cnic">CNIC #</h3>
                                                <input name="cnic" value="" type="number" class="form-control">
                                                <div class="invalid-feedback cnic-feedback"></div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-action">
                                        <button type="submit" name="btn" class="btn btn-block btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                {{-- Education --}}
                                @include('pages.profile.education_tab')
                                {{-- Experience --}}
                                <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <p>EXPERIENCE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            EDUCATION_FORM.GET_EDUCATIONAL_DEGREES();
        });
    </script>

@endsection
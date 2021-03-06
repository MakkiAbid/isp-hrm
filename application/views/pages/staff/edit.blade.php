@extends("layouts.app")

@section("title", "Edit Staff")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Edit Staff
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="name">Name</h3>
                                    <input value="{{ $staff->name }}" id="name" name="name" type="text" class="form-control">
                                    <div class="invalid-feedback name-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Email</h3>
                                    <input value="{{ $staff->email }}" id="email" name="email" type="text" class="form-control">
                                    <div class="invalid-feedback email-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Password</h3>
                                    <input id="password" name="password" type="password" class="form-control">
                                    <div class="invalid-feedback password-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="city">City</h3>
                                    <input value="{{ $staff->personal_info->city }}" id="city" name="city" type="text" class="form-control">
                                    <div class="invalid-feedback city-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="address">Address</h3>
                                    <input value="{{ $staff->personal_info->address }}" id="address" name="address" type="text" class="form-control">
                                    <div class="invalid-feedback address-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="phone">Phone</h3>
                                    <input value="{{ $staff->personal_info->phone }}" id="phone" name="phone" type="text" class="form-control">
                                    <div class="invalid-feedback address-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="dob">Date of Birth</h3>
                                    <input id="dob" name="dob" value="{{ $staff->personal_info->dob }}" type="date" class="form-control">
                                    <div class="invalid-feedback dob-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="gender">Gender</h3>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option {{ $staff->personal_info->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                        <option {{ $staff->personal_info->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback gender-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="marital_status">Marital Status</h3>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="">Set Status</option>
                                        <option {{ $staff->personal_info->marital_status == 'single' ? 'selected' : '' }} value="single">Single</option>
                                        <option {{ $staff->personal_info->marital_status == 'married' ? 'selected' : '' }} value="married">Married</option>
                                    </select>
                                    <div class="invalid-feedback marital_status-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="nationality">Nationality</h3>
                                    <input value="{{ $staff->personal_info->nationality }}" id="nationality" name="nationality" type="text" class="form-control">
                                    <div class="invalid-feedback nationality-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="religion">Religion</h3>
                                    <input value="{{ $staff->personal_info->religion }}" id="religion" name="religion" type="text" class="form-control">
                                    <div class="invalid-feedback religion-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="cnic">CNIC #</h3>
                                    <input value="{{ $staff->personal_info->cnic }}" id="cnic" name="cnic" type="text" class="form-control">
                                    <i class="text-muted">e.g. 36302-1234567-8</i>
                                    <div class="invalid-feedback cnic-feedback"></div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary">Save Changes</button>
                        </div>
                        {!! form_close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
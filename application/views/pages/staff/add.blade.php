@extends("layouts.app")

@section("title", "Add Staff")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Add Staff
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="name">Name</h3>
                                    <input id="name" name="name" value="" type="text" class="form-control">
                                    <div class="invalid-feedback name-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Email</h3>
                                    <input id="email" name="email" value="" type="text" class="form-control">
                                    <div class="invalid-feedback email-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3">Password</h3>
                                    <input id="password" name="password" value="" type="password" class="form-control">
                                    <div class="invalid-feedback password-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="city">City</h3>
                                    <input id="city" name="city" value="" type="text" class="form-control">
                                    <div class="invalid-feedback city-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="address">Address</h3>
                                    <input id="address" name="address" value="" type="text" class="form-control">
                                    <div class="invalid-feedback address-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="dob">Date of Birth</h3>
                                    <input id="dob" name="dob" value="" type="date" class="form-control">
                                    <div class="invalid-feedback dob-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="gender">Gender</h3>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback gender-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="marital_status">Marital Status</h3>
                                    <select name="marital_status" id="marital_status" class="form-control">
                                        <option value="">Set Status</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                    <div class="invalid-feedback marital_status-feedback"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h3 class="h3" for="nationality">Nationality</h3>
                                    <input id="nationality" name="nationality" value="" type="text" class="form-control">
                                    <div class="invalid-feedback nationality-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="religion">Religion</h3>
                                    <input id="religion" name="religion" value="" type="text" class="form-control">
                                    <div class="invalid-feedback religion-feedback"></div>
                                </div>
                                <div class="col">
                                    <h3 class="h3" for="cnic">CNIC #</h3>
                                    <input id="cnic" name="cnic" value="" type="text" class="form-control">
                                    <i class="text-muted">e.g. 36302-1234567-8</i>
                                    <div class="invalid-feedback cnic-feedback"></div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary">Add Staff</button>
                        </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
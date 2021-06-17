@extends("layouts.app")

@section("title", "Edit Admin")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Edit Admin
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input value="{{ $admin->name }}" name="name" type="text" class="form-control" id="name" placeholder="Full name">
                                <div class="invalid-feedback name-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input value="{{ $admin->email }}" name="email" type="text" class="form-control" id="email" placeholder="Enter Email">
                                <div class="invalid-feedback email-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                <div class="invalid-feedback password-feedback"></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary btn-block">Save Changes</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
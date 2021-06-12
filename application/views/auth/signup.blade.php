@extends("layouts.auth")

@section("title", "Signup")

@section("styles")
    <style>
        .login-box {
            min-width: 520px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
@endsection

@section("content")
    <div class="login-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">HRM - Signup</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Full name</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Full name">
                                        <div class="invalid-feedback name-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input name="email" type="text" class="form-control" id="email" placeholder="Enter Email">
                                        <div class="invalid-feedback email-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                        <div class="invalid-feedback password-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="signup" class="btn btn-block btn-primary">Signup</button>
                            <p class="text-center my-3">Already registered? <a href="/auth/login">Login here</a></p>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
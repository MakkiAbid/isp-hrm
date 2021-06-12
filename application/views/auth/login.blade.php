@extends("layouts.auth")

@section("title", "Login")

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
                        {!! form_open(current_url(), ['class' => 'ajax-form', 'data-refresh' => true]) !!}
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">HRM - Login</div>
                                </div>
                                <div class="card-body">
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
                                    <button type="submit" name="login" class="btn btn-block btn-primary">Login</button>
                                    <p class="text-center my-3">Need a Job? <a href="/auth/signup">Signup here as Candidate</a></p>
                                </div>
                            </div>
                        {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
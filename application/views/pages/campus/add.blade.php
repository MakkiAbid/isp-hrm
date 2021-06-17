@extends("layouts.app")

@section("title", "Add Campus")

@section("content")


    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    {!! form_open(current_url(), ['class' => 'ajax-form']) !!}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Add Campus
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Campus Name</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Campus Name">
                                        <div class="invalid-feedback name-feedback"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input name="city" type="text" class="form-control" id="city" placeholder="Campus City">
                                        <div class="invalid-feedback city-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" name="btn" class="btn btn-primary">Add Campus</button>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
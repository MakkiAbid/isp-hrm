<div class="tab-pane fade show active" id="personal_info" role="tabpanel" aria-labelledby="personal_info-tab">
    {!! form_open(base_url('usersinfo'), ['class' => 'ajax-form']) !!}
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h3 class="h3" for="name">Name</h3>
                <input id="name" name="name" value="{{ $user_info->name }}" type="text" class="form-control">
                <div class="invalid-feedback name-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3">Email</h3>
                <input id="email" name="email" value="{{ $user_info->email }}" type="text" class="form-control">
                <div class="invalid-feedback email-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3">Bio</h3>
                <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{ $user_info->personal_info->bio }}</textarea>
                <div class="invalid-feedback email-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="city">City</h3>
                <input id="city" name="city" value="{{ $user_info->personal_info->city }}" type="text" class="form-control">
                <div class="invalid-feedback city-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="address">Address</h3>
                <input id="address" name="address" value="{{ $user_info->personal_info->address }}" type="text" class="form-control">
                <div class="invalid-feedback address-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3">Phone</h3>
                <input id="phone" name="phone" value="{{ $user_info->personal_info->phone }}" type="text" class="form-control">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="dob">Date of Birth</h3>
                <input id="dob" name="dob" value="{{ $user_info->personal_info->dob }}" type="date" class="form-control">
                <div class="invalid-feedback dob-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="gender">Gender</h3>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option @if($user_info->personal_info->gender == 'male') selected @endif value="male">Male</option>
                    <option @if($user_info->personal_info->gender == 'female') selected @endif value="female">Female</option>
                </select>
                <div class="invalid-feedback gender-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="marital_status">Marital Status</h3>
                <select name="marital_status" id="marital_status" class="form-control">
                    <option value="">Set Status</option>
                    <option @if($user_info->personal_info->marital_status == 'single') selected @endif value="single">Single</option>
                    <option @if($user_info->personal_info->marital_status == 'married') selected @endif value="married">Married</option>
                </select>
                <div class="invalid-feedback marital_status-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="nationality">Nationality</h3>
                <input id="nationality" name="nationality" value={{ $user_info->personal_info->nationality }}"" type="text" class="form-control">
                <div class="invalid-feedback nationality-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="religion">Religion</h3>
                <input id="religion" name="religion" value="{{ $user_info->personal_info->religion }}" type="text" class="form-control">
                <div class="invalid-feedback religion-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="cnic">CNIC #</h3>
                <input id="cnic" name="cnic" value="{{ $user_info->personal_info->cnic }}" type="text" class="form-control">
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
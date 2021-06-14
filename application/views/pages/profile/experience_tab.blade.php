<div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col text-right">
                <div class="btn btn-primary" onclick="add_experience();">Add Experience</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! form_open(base_url('usersexperience'), ['class' => 'ajax-form']) !!}
        <div id="experience_wrapper">

        </div>
        <div class="row">
            <div class="col-3">
                <button id="save-btn-ex" type="submit" name="btn" class="btn btn-primary d-none">Save</button>
            </div>
        </div>
        {!! form_close() !!}
    </div>
</div>
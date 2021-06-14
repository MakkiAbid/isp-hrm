<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col text-right">
                <div class="btn btn-primary" id="add_more" onclick="EDUCATION_FORM.ADD_EDUCATION();">Add Education</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! form_open(base_url('userseducation'), ['class' => 'ajax-form']) !!}
            <div id="education_wrapper">

            </div>
            <div class="row">
                <div class="col-3">
                    <button id="save-btn" type="submit" name="btn" class="btn btn-primary d-none">Save</button>
                </div>
            </div>
        {!! form_close() !!}
    </div>
</div>


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
    <div class="card-header pt-0">
        <div class="row">
            <div class="col text-left">
                <h1 class="h1">My Educations</h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Institute</th>
                <th scope="col">Degree</th>
                <th scope="col">Year</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user_info->user_education->sortBy('year') as $institute)
                <tr>
                    <td>{{  $institute->institute  }}</td>
                    <td>{{  $institute->education_type->education  }}</td>
                    <td>{{  $institute->year  }}</td>
                    <td>
                        <a href="{{ base_url('userseducation/delete/'.$institute->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="4">No Data Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>


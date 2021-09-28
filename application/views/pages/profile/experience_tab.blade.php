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
    <div class="card-header pt-0">
        <div class="row">
            <div class="col text-left">
                <h1 class="h1">My Experiences</h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Company</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user_info->user_experience->sortBy('end_date') as $experience)
                <tr>
                    <td>{{  $experience->company  }}</td>
                    <td>
                        <a href="{{ base_url('usersexperience/delete/'.$experience->id) }}" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="2">No Data Found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
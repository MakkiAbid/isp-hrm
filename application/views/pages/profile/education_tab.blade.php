<div class="tab-pane fade show active" id="education" role="tabpanel" aria-labelledby="education-tab">
    <div class="card-header">
        <div class="row align-items-center">
            {{--                                            <div class="col">--}}
            {{--                                                <div class="card-title">--}}
            {{--                                                    Education--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            <div class="col text-right">
                <div class="btn btn-lg btn-primary" id="add_more" onclick="EDUCATION_FORM.ADD_EDUCATION()">Add Education</div>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div id="education_wrapper">
            <div class="row">

            </div>
        </div>

        <h1 class="h1">Matriculation</h1>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="major_sub_matric">Major Subjects (Science, Arts)</h3>
                <input name="major_sub_matric" type="text" class="form-control" id="major_sub_matric" placeholder="">
                <div class="invalid-feedback major_sub_matric-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="school">School</h3>
                <input name="school" type="text" class="form-control" id="school" placeholder="School name">
                <div class="invalid-feedback school-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="board">Board</h3>
                <input name="board" type="text" class="form-control" id="board" placeholder="Board">
                <div class="invalid-feedback board-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="year">Year</h3>
                <input name="year" type="text" class="form-control" id="year" placeholder="year">
                <div class="invalid-feedback year-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="total_marks">Total Marks</h3>
                <input name="total_marks" type="number" class="form-control" id="total_marks" placeholder="Total Marks">
                <div class="invalid-feedback total_marks-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="obtained_marks">Obtained Marks</h3>
                <input name="obtained_marks" type="number" class="form-control" id="obtained_marks" placeholder="Obtained Marks">
                <div class="invalid-feedback obtained_marks-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="division">Division</h3>
                <input name="division" type="text" class="form-control" id="division" placeholder="Division">
                <div class="invalid-feedback division-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="percentage">Percentage</h3>
                <input name="percentage" type="number" class="form-control" id="percentage" placeholder="Percentage">
                <div class="invalid-feedback percentage-feedback"></div>
            </div>
        </div>
        <hr>
        {{-- Matriculation ends here --}}
        <h1 class="h1 mt-2">Intermediate</h1>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="major_sub_inter">Major Subjects (F.S.C Pre-Medical, F.S.C Engineering, ICS, I.COM)</h3>
                <input name="major_sub_inter" type="text" class="form-control" id="major_sub_inter" placeholder="">
                <div class="invalid-feedback major_sub_inter-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="college">School</h3>
                <input name="college" type="text" class="form-control" id="college" placeholder="College name">
                <div class="invalid-feedback college-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="board">Board</h3>
                <input name="board" type="text" class="form-control" id="board" placeholder="Board">
                <div class="invalid-feedback board-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="year">Year</h3>
                <input name="year" type="text" class="form-control" id="year" placeholder="year">
                <div class="invalid-feedback year-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="total_marks">Total Marks</h3>
                <input name="total_marks" type="number" class="form-control" id="total_marks" placeholder="Total Marks">
                <div class="invalid-feedback total_marks-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="obtained_marks">Obtained Marks</h3>
                <input name="obtained_marks" type="number" class="form-control" id="obtained_marks" placeholder="Obtained Marks">
                <div class="invalid-feedback obtained_marks-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="division">Division</h3>
                <input name="division" type="text" class="form-control" id="division" placeholder="Division">
                <div class="invalid-feedback division-feedback"></div>
            </div>
            <div class="col">
                <h3 class="h3" for="percentage">Percentage</h3>
                <input name="percentage" type="number" class="form-control" id="percentage" placeholder="Percentage">
                <div class="invalid-feedback percentage-feedback"></div>
            </div>
        </div>
        <hr>
        {{-- Intermediate ends here --}}
        <h1 class="h1 mt-2">Bachelor (4 Year)</h1>
        <div class="row">
            <div class="col">
                <h3 class="h3" for="bachelor">Bachelor (4 Year)</h3>
                <input name="school" type="text" class="form-control" id="school" placeholder="School name">
                <div class="invalid-feedback school-feedback"></div>
            </div>
        </div>
        <hr>
    </div>
</div>


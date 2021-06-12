let total_fields = 0;
let educational_degrees = [];

const EDUCATION_FORM = {

    GET_EDUCATIONAL_DEGREES: function () {
        $.get('/education/get_education_types', function (result) {
            educational_degrees = result;
        });
    },

    GET_EDUCATION_ROW: function () {
        let degrees_options = ``;
        let education_row_html = ``;
        for(let degree of educational_degrees) {
            degrees_options += `<option value="${degree.id}">${degree.education}</option>`;
        }
        education_row_html += `<div class="row" id="education_row_wrapper_${total_fields}">` +
                `<div class="col-2 degree_field_wrapper">` +
                    `<label class="d-block"><strong>Degree</strong></label>` +
                    `<select class="form-control degree_field" name="education[${total_fields}][degree]" onchange="EDUCATION_FORM.RENDER_FIELDS(${total_fields})">${degrees_options}</select>` +
                `</div>` +
                `<div class="col-2">` +
                    `<div class="obtained_marks_field_wrapper d-none">` +
                        `<label class="d-block"><strong>Obtained</strong></label>` +
                        `<input type="number" class="form-control obtained_marks_field" name="education[${total_fields}][obtained_marks]" >` +
                    `</div>` +
                `</div>` +
                `<div class="col-2">` +
                    `<div class="total_marks_field_wrapper d-none">` +
                        `<label class="d-block"><strong>Total</strong></label>` +
                        `<input type="number" class="form-control total_marks_field" name="education[${total_fields}][total_marks]" >` +
                    `</div>` +
                `</div>` +
                `<div class="col-2">` +
                    `<div class="year_field_wrapper d-none">` +
                        `<label class="d-block"><strong>Passing Year</strong></label>` +
                        `<input class="form-control year_field" name="education[${total_fields}][year]" >` +
                    `</div>` +
                `</div>` +
                `<div class="col-3">` +
                    `<div class="institute_field_wrapper d-none">` +
                        `<label class="d-block"><strong>Institute/Board</strong></label>` +
                        `<input class="form-control institute_field" name="education[${total_fields}][institute]" >` +
                    `</div>` +
                `</div>` +
                `<div class="col-1">` +
                    `<label class="d-block"><strong>&nbsp;</strong></label>` +
                    `<div class="btn btn-sm btn-danger mt-1" id="remove_education" onclick="EDUCATION_FORM.REMOVE_EDUCATION(${total_fields})"><i class="fas fa-times"/></div>` +
                `</div>` +
            `</div>`;

        return education_row_html;
    },

    ADD_EDUCATION: function () {

        $('#education_wrapper').append(EDUCATION_FORM.GET_EDUCATION_ROW());
        setTimeout(function () {
            let row_no = total_fields - 1;
            $(`#education_row_wrapper_${row_no} .degree_field_wrapper select`).trigger('change');
        }, 500)

        total_fields++;
    },

    REMOVE_EDUCATION: function (row_no) {
        $(`#education_row_wrapper_${row_no}`).remove();
    },

    RENDER_FIELDS: function (row_no) {
        let selected_degree = null;
        for(let degree of educational_degrees) {
            if (parseInt($(`#education_row_wrapper_${row_no} .degree_field_wrapper select`).val(), 10) === parseInt(degree.id, 10)) {
                selected_degree = degree;
            }
        }

        if (selected_degree === null) {
            alert("Invalid option selected");
            return;
        }

        $(`#education_row_wrapper_${row_no} .obtained_marks_field_wrapper label strong`).html("Obtained " + selected_degree.marks_type);
        $(`#education_row_wrapper_${row_no} .total_marks_field_wrapper label strong`).html("Total " + selected_degree.marks_type);

        $(`#education_row_wrapper_${row_no} .obtained_marks_field_wrapper`).removeClass('d-none');
        $(`#education_row_wrapper_${row_no} .total_marks_field_wrapper`).removeClass('d-none');
        $(`#education_row_wrapper_${row_no} .year_field_wrapper`).removeClass('d-none');
        $(`#education_row_wrapper_${row_no} .institute_field_wrapper`).removeClass('d-none');

    }

};

export default EDUCATION_FORM;
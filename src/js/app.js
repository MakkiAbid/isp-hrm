// importing scss file
import "../sass/main.scss";

//jQuery Scrollbar
import "jquery.scrollbar/jquery.scrollbar"

// snackbar
const Snackbar = require('node-snackbar');


// importing jquery
window.$ = window.jQuery = require("jquery");


// importing popper.js
window.Popper = require("popper.js").default;

// importing bootstrap
require('bootstrap');

// import atlantis
import "./atlantis";

import EDUCATION_FORM from "./education_form";
window.EDUCATION_FORM = EDUCATION_FORM;
/*
================================================
|            Custom Functions                  |
================================================
*/

window.notification = function notification(message, color="primary", duration=2000 ,pos = 'top-center'){
    let customValues = {
        text: message,
        pos: pos,
        duration: duration,
    };
    if(color === 'primary'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#1b55e2';
    }
    if(color === 'success'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#8dbf42';
    }
    if(color === 'info'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#2196f3';
    }
    if(color === 'warning'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#e2a03f';
    }
    if(color === 'danger'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#e7515a';
    }
    if(color === 'dark'){
        customValues['actionTextColor'] = '#fff';
        customValues['backgroundColor'] = '#3b3f5c';
    }
    Snackbar.show(customValues);
}



const loading_spinner = `<i class="fas fa-circle-notch fa-2x fa-spin"></i>`;
// Append Modal against user_id
$(".fetch-btn").on('click', function (event) {
   event.preventDefault();
    $("#CandidateDetails").modal('show');
    $.ajax({
      url: $(this).attr('href'),
      type: 'post',
      beforeSend: () => {
          console.log($("#CandidateDetails .modal-body"));
          $("#CandidateDetails .modal-body").html(`
            <div class="d-flex py-5 justify-content-center align-items-center">${loading_spinner}</div>
          `);
      },
      success: function (data) {
          console.log(data);
          let generated_html = '';
          if(data){
              let educations = '';
              let experiences = '';
              data.educations.forEach(education => {
                educations += `
                    <tr>
                        <td>${education.education}</td>
                        <td>${education.obtained} ${education.marks_type}</td>
                        <td>${education.total} ${education.marks_type}</td>
                        <td>${education.year}</td>
                        <td>${education.institute}</td>
                    </tr>
                `;
              });
              data.experiences.forEach(experience => {
                  experiences += `
                    <tr>
                        <td>${experience.company}</td>
                        <td>${experience.designation}</td>
                        <td>${experience.start_date}</td>
                        <td>${experience.end_date}</td>
                    </tr>
                `;
              });
              let generated_html = `
                <h3>Educations</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Education</th>
                            <th>Obtained</th>
                            <th>Total</th>
                            <th>Year</th>
                            <th>Institute</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${educations}
                    </tbody>
                </table>
                <h3>Experiences</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Designation</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${experiences}
                    </tbody>
                </table>
              `;
              $("#CandidateDetails .modal-body").html(generated_html);
          }
      }
   });
});


// Delete AJAX
$(".delete-btn").on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: $(this).attr('href'),
        type: 'get',
        success: function (data){
            notification(data.messages, 'success');
            if (data.redirect_url) {
                setTimeout(() => {
                    location.href = data.redirect_url;
                }, 2000);
            }
            // console.log(data);
        }
    });
});

// AJAX FORM
$(".ajax-form").on('submit', function (event){
    event.preventDefault();
    const url  = $(this).attr('action');
    const type = $(this).attr('method');
    const is_refresh = $(this).data('refresh');
    const payload = $(this).serializeArray();
    const submit = $(this).find('button[type="submit"]');
    const submit_content = submit.html();
    $(this).find('input, textarea, select, button').attr('disabled', true);
    $.ajax({
        url: url,
        type: type,
        data: payload,
        beforeSend: () => {
            $(this).find('input, textarea, select').removeClass('is-invalid');
            submit.html(loading_spinner);
        },
        success: (data) => {
            $(this).find('input, textarea, select, button').attr('disabled', false);
            submit.html(submit_content);
            if(data.error && data.form){
                let messages = data.messages;
                Object.keys(messages)
                    .forEach(function (key){
                        $("#"+key).addClass('is-invalid');
                        $("."+key+"-feedback").text(messages[key]);
                    });
            }else{
                if(data.error){
                    notification(data.messages, 'error');
                }else{
                    if (is_refresh) {
                        if (data.redirect_url) {
                            notification("Redirect...", 'dark', 2500, 'top-center');
                            setTimeout(() => {
                                location.href = data.redirect_url;
                            }, 3000);
                        }
                    } else {
                        notification(data.messages, 'success');
                        if (data.redirect_url) {
                            setTimeout(() => {
                                location.href = data.redirect_url;
                            }, 3000);
                        }
                    }
                }
            }
        }
    });
});

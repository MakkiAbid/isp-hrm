<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobPost extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!auth()){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $job_posts = JobPostModel::all();
        $this->view('pages.job_post.all', compact('job_posts'));
    }

    public function add()
    {
        $departments = DepartmentsModel::all();
        $education_types = EducationTypesModel::all();
        $campuses = CampusModel::all();
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'department_id',
                    'label' => 'Department',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'education_types_id',
                    'label' => 'Minimum Requirement',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'campus_id',
                    'label' => 'Campus',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'title',
                    'label' => 'Job Title',
                    'rules' => 'required'
                ],
                [
                    'field' => 'no_of_seats',
                    'label' => 'No. of Seats',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'minimum_experience',
                    'label' => 'Experience',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'last_submission_date',
                    'label' => 'Last Submission Date',
                    'rules' => 'required'
                ],
                [
                    'field' => 'description',
                    'label' => 'Description',
                    'rules' => 'required'
                ]
            );

            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === FALSE) {
                return $this->JSONResponse([
                   'error' => true,
                   'form' => true,
                   'messages' => $this->form_validation->error_array()
                ]);
            }else{
                try {
                    JobPostModel::create([
                       'department_id' => $this->input->post('department_id'),
                       'education_types_id' => $this->input->post('education_types_id'),
                       'campus_id' => $this->input->post('campus_id'),
                       'title' => $this->input->post('title'),
                       'no_of_seats' => $this->input->post('no_of_seats'),
                       'minimum_experience' => $this->input->post('minimum_experience'),
                       'last_submission_date' => $this->input->post('last_submission_date'),
                       'description' => $this->input->post('description'),
                       'is_publish' => 1
                    ]);

                    return $this->JSONResponse([
                        'error' => false,
                        'form' => false,
                        'redirect_url' => base_url('jobpost'),
                        'messages' => 'Job Posted successfully'
                    ]);

                }catch (\Exception $e) {
                    return $this->JSONResponse([
                        'error' => true,
                        'form' => true,
                        'messages' => 'Something went wrong please try again!'
                    ]);
                }
            }

        }else {
            $this->view('pages.job_post.add', compact('departments' , 'education_types' , 'campuses'));
        }
    }
}